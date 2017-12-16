<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
	public function send(){
		Mail::send(['text' => 'mail'], ['name', 'Hans'], function ($message){
			$message->to('hans.grw22@gmail.com', 'To Hans')->subject('Meu teste de email');
			$message->from('hans.grw22@gmail.com', 'Hans');
		});

		return view('thankyoupage');
	}
}
