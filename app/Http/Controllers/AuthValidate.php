<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthValidate extends Controller
{
    public function validateAuthentication(Request $request){

    	$username = $request->input('userName');
    	$password = $request->input('inputPassword');

    	$checklogin = DB::table('users')->where(['name' => $username, 'password' => $password])->get();
    	if (count($checklogin) > 0){
    		return redirect('/products');
	    }

	    return redirect('/')->with('message', 'Login Failed');

    }
}
