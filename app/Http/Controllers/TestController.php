<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('tests.one');
    } 

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function one()
    {
		
		return view('tests.one');
    }	
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function two()
    {
		return view('tests.two');
    }
	
	
	
	
}
