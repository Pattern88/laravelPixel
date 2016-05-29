<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pixels\Pixel;

use Session;

class PixelController extends Controller
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
		
		return view('pixels.index');
    }
	
	public function store(Request $request)
    {
		
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'url'       		=> 'required|url',
            'popupTrigger'      => 'required|integer',
            'popupLocation' 	=> 'required|integer'
        );
		
        $validator = Validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('pixels')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $pixel = new Pixel;
            $pixel->url       			= Input::get('url');
            $pixel->popup_trigger     	= Input::get('popupTrigger');
            $pixel->popup_location 		= Input::get('popupLocation');
			$pixel->user_id 			= $request->user()->id;
            $pixel->save();

            // redirect
            Session::flash('message', 'Successfully created pop-up pixel!');
            return redirect('pixels');
        }
    }
}
