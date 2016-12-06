<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class StoreDataController extends Controller
{
    public function storeData_Position(Request $request,$machine_index)
    {
    	$results = DB::update('UPDATE positions set m_x = ? where id = 1', array(10));
    	$results = DB::update('UPDATE machine set latest_conn_at = ? where id = 1', array(time()));

        return 'Update!!!!'
    }

}
