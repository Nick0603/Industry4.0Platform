<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

	public function ajax_monitor($machine_index)
    {
    	$company = Auth::user()->company;
    	$machine = $company->machines[$machine_index-1];
    	$machine->position;
    	return  $machine;
    }
}
