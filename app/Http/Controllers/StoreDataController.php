<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

use App\Machine;
use App\utilization;
use App\order;
class StoreDataController extends Controller
{

	public function getToken(){
		$token = trim(csrf_token());
		return $token;
	}

    public function storeData_Position(Request $request,$machine_index)
    {
    	$results = DB::update('UPDATE positions set m_x = ? where id = '.$machine_index, array($request->input('m_x')));
    	$results = DB::update('UPDATE positions set m_y = ? where id = '.$machine_index, array($request->input('m_y')));
    	$results = DB::update('UPDATE positions set m_z = ? where id = '.$machine_index, array($request->input('m_z')));
    	$results = DB::update('UPDATE positions set abs_x = ? where id = '.$machine_index, array($request->input('abs_x')));    	
    	$results = DB::update('UPDATE positions set abs_y = ? where id = '.$machine_index, array($request->input('abs_y')));
    	$results = DB::update('UPDATE positions set abs_z = ? where id = '.$machine_index, array($request->input('abs_z')));

    	$results = DB::update('UPDATE machines set latest_conn_at = ? where id = 1', array(time()));

        return 'Update!!'.time();
    }


    public function storeData_utilization(Request $request,$machine_index,$order_id)
    {
        $machine = machine::find($machine_index);
        $order = order::find($order_id);
        if($machine == null || $order == null){
            abort(404);
        }
        $utilization = $machine->utilizations->where('date',$request->date);
        if(count($utilization) != 0){
            return '已有此稼動率資訊';
        }
        $utilization = new utilization();
        $utilization->date = $request->date;     
        $utilization->machine_id = $machine_index;   
        $utilization->order_id = $request->order_id;   
        $utilization->busyTimer = $request->busyTimer;      
        $utilization->idleTimer = $request->idleTimer;   
        $utilization->alarmTimer = $request->alarmTimer;   
        $utilization->offTimer = $request->offTimer;   
        $utilization->save();
        return $utilization;
        
    }
}
