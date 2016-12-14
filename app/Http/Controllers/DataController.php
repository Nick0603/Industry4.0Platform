<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Machine;
use App\order;
use App\utilization;
use App\remark;

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



	public function monitor($machine_index)
    {
        return view('machines.monitor');
    }

	public function ajax_monitor($machine_index)
    {
        $company = Auth::user()->company;
    	$machine = $company->machines[$machine_index-1];
        $machine->position;

        //如果連線時誤差超過 5 秒即視為斷線
        if(abs($machine->latest_conn_at - time())<=5){
            $machine->conn_status = 1;
        }else{
            $machine->conn_status = 0;
        }

    	return  $machine;
    }

    public function test_monitor($machine_index)
    {
        return view('machines.test_monitor');
    }


    public function ajax_test_monitor($machine_index)
    {
        $company = Auth::user()->company;
        $machine = $company->machines[$machine_index-1];
        $machine->latest_conn_at = time();
        $machine->save();

        $position = $machine->position;
        
        $position->m_x += rand(-20, 20);
        $position->m_y += rand(-20, 20);
        $position->m_z += rand(-20, 20);
        $position->abs_x += rand(-20, 20);
        $position->abs_y += rand(-20, 20);
        $position->abs_z += rand(-20, 20);
        $position->save();

        return 'Update!';
    }

    public function data_uilization_latest($machine_index)
    {
        $machines = Auth::user()->company->machines;
        if($machines->count() < $machine_index){
            abort(404);
        }
        $machine = $machines[$machine_index - 1];
        $itemType = $machine->latestOrder()->itemType;
        return redirect('/data/machines/'.$machine_index.'/machineData/utilization/'.$itemType.'/all');
    }

    public function data_uilization($machine_index,$Order_itemType,$DisplayType)
    {
        $machines = Auth::user()->company->machines;
        if($machine_index <= 0  || $machine_index >= $machines->count()){
            abort(404);
        }

        $machine = $machines[$machine_index - 1];

        $selected_order = DB::table('utilizations')
             ->select(DB::raw('name,itemType'))
             ->join('orders', 'utilizations.order_id', '=', 'orders.id')
             ->where('machine_id',$machine->id)
             ->where('itemType',$Order_itemType)
             ->groupBy('itemType')
             ->get();

        if(!($selected_order)){
            return Response::make('Not Found', 404);
        }
        
        $selected_order = $selected_order[0];
        $orders = $machine->allOrders();

        if($DisplayType == 'all'){
            return view('machines.utilizations',compact('selected_order','orders','DisplayType'));
        }else{
            return view('machines.utilizationSimple',compact('selected_order','orders','DisplayType'));
        }
        
    }


    public function data_uilization_ajax($machine_index,$Order_itemType){

        $data = DB::table('utilizations')
             ->select(DB::raw('date,round(busyTimer/24*100) as utilization,busyTimer,idleTimer,alarmTimer,offTimer,title as remarkTitle,content as remarkContent'))
             ->leftJoin('remarks','utilizations.id', '=', 'remarks.utilization_id')
             ->join('orders','utilizations.order_id', '=', 'orders.id')
             ->where('machine_id',$machine_index)
             ->where('itemType',$Order_itemType)
             ->get();

        return $data;
    }

    public function data_uilization_updateRemark(Request $request,$machine_index,$Order_itemType,$DisplayType)
    {

        $company = Auth::user()->company;
        $machine = $company->machines[$machine_index-1];
        $utiziation = $machine->utilizations->where("date",$DisplayType)->first();
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

}




        /*  自動化測試用  DB薪資utilization資料
        for($i=4;$i<=30;$i++){
            $total = 24;
            $busy = rand(17,21);$total-=$busy;
            $idle = rand(0,$total);$total-=$idle;
            $alarm = rand(0,$total);$total-=$alarm;
            $off = rand(0,$total);

            $u = new utilization();
            $u->machine_id = 1;
            $u->order_id = 1;
            $u->date="2016-11-" .sprintf("%02d",$i);
            $u->busyTimer = $busy;
            $u->idleTimer = $idle;
            $u->alarmTimer = $alarm;
            $u->offTimer = $off;
            $u->save();
        }
        */