<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


use App\Machine;
use App\order;
use App\utilization;
use App\remark;
use Carbon\Carbon;
use Mail;

class DataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


	public function status()
    {
    	$company = Auth::user()->company;
        $company->machines;
        $company->order;
        foreach($company->machines as $machine){
            $machine->position;
            $machine->uilizations;
        }

        return $company;
    }


    public function monitorFirst(Request $request)
    {
        $company = Auth::user()->company;
        $fistMachine = $company->machines[0];

        return redirect('/data/machines/'.$fistMachine->id.'/immediate');
    }

	public function monitor($machine_index)
    {

        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }

        return view('machines.monitor',compact('machine'));
    }

	public function ajax_monitor($machine_index)
    {

        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }

        $immediateData = $machine->immediateData;
        $updated_at = $immediateData['updated_at']->getTimestamp();
        //如果連線時誤差超過 5 秒即視為斷線
        if(abs($updated_at - time())<=5){
            return  $immediateData;
        }

        return  -1;
        
    }

    public function test_monitor($machine_index)
    {
        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }
        return view('machines.test_monitor',compact('machine'));
    }


    public function ajax_test_monitor($machine_index)
    {

        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }
        $immediateData = $machine->immediateData;
        $immediateData->m_x += rand(-20, 20);
        $immediateData->m_y += rand(-20, 20);
        $immediateData->m_z += rand(-20, 20);
        $immediateData->abs_x += rand(-20, 20);
        $immediateData->abs_y += rand(-20, 20);
        $immediateData->abs_z += rand(-20, 20);
        $immediateData->temperature = rand(20, 50);
        $immediateData->spinderLoad = rand(30, 95);
        $immediateData->touch();

        $immediateData->save();
        return 'Update!';
    }
    public function data_uilization_First()
    {
        $company = Auth::user()->company;
        $fistMachine = $company->machines[0];
        return redirect('/data/machines/'.$fistMachine->id.'/machineData/utilization/latestOrder');
    }
    public function data_uilization_latest($machine_index)
    {

        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }
        $latestoder = $machine->latestOrder();
        if($latestoder){
            $itemType = $latestoder->itemType;
            return redirect('/data/machines/'.$machine_index.'/machineData/utilization/'.$itemType.'/all');
        }else{
            return redirect('/data/machines/'.$machine_index.'/machineData/utilization/empty/all');
        }
        
    }

    public function data_uilization($machine_index,$Order_itemType,$DisplayType)
    {
        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }


        $selected_order = DB::table('utilizations')
             ->select(DB::raw('name,itemType'))
             ->join('orders', 'utilizations.order_id', '=', 'orders.id')
             ->where('machine_id',$machine->id)
             ->where('itemType',$Order_itemType)
             ->groupBy('itemType')
             ->get();

        if(!($selected_order)){
            return view('machines.utilizationsEmpty');
        }
        
        $selected_order = $selected_order[0];
        $orders = $machine->allOrders();

        if($DisplayType == 'all'){
            return view('machines.utilizations',compact('machine','selected_order','orders','DisplayType'));
        }else{
            return view('machines.utilizationSimple',compact('machine','selected_order','orders','DisplayType'));
        }
        
    }


    public function data_uilization_ajax($machine_index,$Order_itemType){

        $data = DB::table('utilizations')
             ->select(DB::raw('date,round(busyTimer/24*100) as utilization,busyTimer,idleTimer,alarmTimer,offTimer,title as remarkTitle,content as remarkContent'))
             ->leftJoin('remarks','utilizations.id', '=', 'remarks.utilization_id')
             ->join('orders','utilizations.order_id', '=', 'orders.id')
             ->where('machine_id',$machine_index)
             ->where('itemType',$Order_itemType)
             ->orderBy('date')
             ->get();

        return $data;
    }

    public function data_uilization_updateRemark(Request $request,$machine_index,$Order_itemType,$DisplayType)
    {

        $company = Auth::user()->company;
        $machine = Machine::where('id',$machine_index)->get();
        $machine = $machine[0];
        if($machine->company_id != $company->id){
            abort(404,'The machine_id is not yours.');
        }
        //$DisplayType為日期
        $utiziation = $machine->utilizations->where("date",$DisplayType)->first();

        if(!($utiziation)){
            abort(404,'The date is not found.');
        }

        $remark = $utiziation->remark;

        if($remark==null){
            $remark = new remark();
            $remark->title = $request->remarkTitle;
            $remark->content = $request->remarkContent;
            $remark->utilization_id = $utiziation->id;

        }else{
            $remark->title = $request->remarkTitle;
            $remark->content = $request->remarkContent;
        }
        $remark->save();
        return redirect('/data/machines/'.$machine_index.'/machineData/utilization/'.$Order_itemType.'/'.$DisplayType);
    }

    public function storeData_Position(Request $request,$machine_index)
    {
        $company = Auth::user()->company;
        $machine = $company->machines[$machine_index-1];
        $machine->latest_conn_at = time();
        $machine->save();

        $position = $machine->position;
        
        $position->m_x = $request->input('m_x');
        $position->m_y = $request->input('m_y');
        $position->m_z = $request->input('m_z');
        $position->abs_x = $request->input('abs_x');
        $position->abs_y = $request->input('abs_y');
        $position->abs_z = $request->input('abs_z');
        $position->save();

        return 'Update!!';
    }

    public function test_storeData_Position($machine_index)
    {
        $company = Auth::user()->company;
        $machine = $company->machines[$machine_index-1];
        $position = $machine->position;

        return view('test.storeDataPosition',compact('position'));
    }

    public function sendAlarm(Request $request,$machine_index,$alarmtype)
    {

        $company = Auth::user()->company;
        $machine = $company->machines[$machine_index-1];
        
        if($alarmtype == 'temperature'){
            $alarmItem = '主軸溫度';
        }else{
            $alarmItem = '主軸負載電流';
        }

        $from =  [
                    // 'email'=>'b10303008@gmail.com',
                    // 'name'=>'Nick',
                    'subject' => $alarmItem.'異常'
                    
                ];

        //填寫收信人信箱
        $to = ['email'=>Auth::user()->email,
               'name'=>Auth::user()->name];
        //信件的內容(即表單填寫的資料)
        $data = ['company'=>$company->name,
                 'machine'=> $machine->name,
                 'email' => $company->email,
                 'address'=>$company->address,
                 'subject'=>'機台警訊，'.$alarmItem.'異常',
                 'url'=>'http://localhost:8000/data/machines/$machine_index'.$machine_index.'/immediate',
                 'msg'=>'內容',
                 'alarmItem'=>$alarmItem,
                 'alarmValue'=>$request->input('alarmValue'),
                 'alarmTime'=>$request->input('time')
                 ];
        //寄出信件
        Mail::send('alarm.spinderAlarm', $data, function($message) use ($from, $to) {
            $message->to($to['email'], $to['name'])->subject($from['subject']);
                });
        return 'success';
    }

}

        /*  自動化測試用  DB薪資utilization資料
        for($i=1;$i<=30;$i++){
            $total = 24;
            $busy = rand(17,23);$total-=$busy;
            $idle = rand(0,$total);$total-=$idle;
            $alarm = rand(0,$total);$total-=$alarm;
            $off = rand(0,$total);

            $u = new utilization();
            $u->machine_id = 3;
            $u->order_id = 1;
            $u->date="2016-11-" .sprintf("%02d",$i);
            $u->busyTimer = $busy;
            $u->idleTimer = $idle;
            $u->alarmTimer = $alarm;
            $u->offTimer = $off;
            $u->save();
        }
        */