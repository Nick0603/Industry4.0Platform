<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $company;

    public function __construct()
    {
        $this->middleware('auth');
        $this->company = Auth::user()->company;
        $this->company->machines;
        foreach($this->company->machines as $machine){
            $machine->position;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = $this->company;
        return view('home',compact('company'));
    }

    public function status()
    {
        return $this->company;
    }
}
