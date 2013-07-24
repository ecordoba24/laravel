<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');

	//return Redirect::to('login');

	return View::make('login');
});

Route::post('login',function(){
	if(Setup::setup_complete()){
		return Redirect::to('/admin');
	}else{
        $rules = array(
            'username'=>'required|max:255','first_name'=>'required|max:255','last_name'=>'required|max:255','email'=>'required|email','password'=>'required|confirmed',
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error',$validation->errors->all());
            return Redirect::to('/admin/setup/')->with_input();
        }else{
        	Setup::setup_database();
            $usr = new User;
            $usr->username = Input::get('username');
            $usr->email = Input::get('email');
            $usr->first_name = Input::get('first_name');
            $usr->last_name = Input::get('last_name');
            $usr->active = 1;
            $usr->admin = 1;
            $usr->password = Input::get('password');
            $usr->save();
            return Redirect::to('/admin');
        }

	}
});