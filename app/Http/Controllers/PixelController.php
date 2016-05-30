<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pixels\Pixel;
use App\User;
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
	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/pixels/create.blade.php)
        return view('pixels.create');
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // // get the user
        // $user = User::find($id);

        // // show the view and pass the user to it
        // return view('pixels.test')
            // ->with('user', $user);
		if(Input::has('domain'))
		{
			$popup = User::find($id)->pixel()->where('url',  Input::get('domain'))->first();
			return response()->json(['popupLocation' => $popup->popup_location, 'popupTrigger' => $popup->popup_trigger, 'url' => $popup->url]);
		}
		return false;
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
            return redirect('pixels/create')
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
            return redirect('pixels/create');
        }
    }
}
