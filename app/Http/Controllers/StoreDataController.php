<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
}
