<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChangeMoneyType extends Controller
{
	public function change(Request $request, $type){

		if ($type == 'USD'){

			$request->session()->put('monetary', '$');
			$request->session()->put('rate', '1.18');

		}elseif ($type == 'BRL'){

			$request->session()->put('monetary', 'R$');
			$request->session()->put('rate', '3.91');

		}else{

			$request->session()->put('monetary', '&euro;');
			$request->session()->put('rate', '1');

		}

		return Redirect::back();

	}
}
