<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageTable;

class SNSController extends Controller
{
    public function index(){
    	$data = MessageTable::orderBy('updated_at', 'desc')->get();
    	return view('SNS.sns_top', ['data' => $data]);
    }
    public function goForm(){
    	return view('SNS.form');
    }

    public function post(Request $request){
    	$msg = $request -> input('message');
    	MessageTable::create(['message' => $msg]);
    	return redirect() -> action('SNSController@index');
    }
}
