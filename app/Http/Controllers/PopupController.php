<?php

/**
 * File: PopupController.php
 *
 * Handle all popup related function: index/create/show/store/
 *
 */

namespace App\Http\Controllers;
use Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Popups\Popup;
use App\User;
use Session;

class PopupController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

		// get all the user popups
        $popups = User::find(Auth::user()->id)->popups;
		
        // load the view and pass the popups
        return view('popups.index')->with('popups', $popups);
    }
	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/popups/create.blade.php)
        return view('popups.create');
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
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

	/**
     * Save specified resource.
     *
     * @return Response
     */
	public function store()
    {
		
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'url'       		=> 'required|url|unique:popups|max:255',
            'popupTrigger'      => 'required',
            'popupLocation' 	=> 'required'
        );
		
        $validator = Validator(Input::all(), $rules);

        // Validate the popus form data
		// If error
        if ($validator->fails()) {
            return redirect('popups/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $popup = new Popup;
            $popup->url       			= Input::get('url');
            $popup->popup_trigger     	= Input::get('popupTrigger');
            $popup->popup_location 		= Input::get('popupLocation');
			$popup->user_id 			= Auth::user()->id;
            $popup->save();

            // redirect
            Session::flash('message', 'Successfully created popup!');
            return redirect('popups');
        }
    }
	
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $popup = Popup::find($id);
        $popup->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the popup');
        return redirect('popups');
    }
}
