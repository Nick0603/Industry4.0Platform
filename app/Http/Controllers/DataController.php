<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Machine;

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
        foreach($company->machines as $machine){
            $machine->position;
        }

        return $company;
    }



	public function monitor($machine_index)
    {
    	$company = Auth::user()->company;
    	$machine = $company->machines[$machine_index-1];
		$machine->position;
        return view('machines.monitor',compact('machine'));
    }

	public function ajax_monitor(Request $request , $machine_index)
    {
        $company = Auth::user()->company;
    	$machine = $company->machines[$machine_index-1];
        $machine->position;

        //operate:1 讀取完連線狀態後將其設為0(未連線)
        $operate = $request->operate;
        if($operate == 1){
            $now_conn = $machine->conn_status;
            $machine->conn_status = 0;
            $machine->save();
            $machine->conn_status = $now_conn;
        }

    	return  $machine;
    }
}
