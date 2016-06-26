<?php

/**
 * File: TestController.php
 *
 * Handle all Test related function: index/show
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\User;



class TestController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show view('tests.one');
     *
     * @return Response
     */
    public function index()
    {
		return view('tests.one');
    } 

	/**
     * Show view('tests.one')
     *
     * @return Response
     */
    public function one()
    {
		
		return view('tests.one');
    }	
	
	/**
     * Show view('tests.two')
     *
     * @return Response
     */
    public function two()
    {
		return view('tests.two');
    }
	
	
	/**
     * Show view('tests.three')
     *
     * @return Response
     */
	public function three()
    {
		return view('tests.three');
    }
	
	
    public function show($id)
    {
		
		if(Input::has('domain'))
		{
			$popup = User::find($id)->popups->where('url', Input::get('domain'))->first();
			if (!is_null($popup)){
				return response()->json(['popupLocation' => $popup->popup_location, 'popupTrigger' => $popup->popup_trigger, 'url' => $popup->url]);
			}
		}
		return view('popups');
    }	
	
}
