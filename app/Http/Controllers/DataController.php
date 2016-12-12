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
        $position->m_y -= rand(-20, 20);
        $position->m_z -= rand(-20, 20);
        $position->abs_x += rand(-20, 20);
        $position->abs_y -= rand(-20, 20);
        $position->abs_z -= rand(-20, 20);
        $position->save();

        return 'Update!';
    }


    public function data_uilization($machine_index)
    {
        return view('machines.utilizations');
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

