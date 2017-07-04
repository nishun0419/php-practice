<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MessageTable;

class SNSController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
    }
    public function index(){
    	$data = MessageTable::where('user', Auth::user() -> name) -> orderBy('updated_at', 'desc') -> get();
    	return view('SNS.sns_top', ['data' => $data]);
    }


    public function post(Request $request){
        $tit = $request -> input('title');
    	$msg = $request -> input('message');
    	MessageTable::create(['title' => $tit, 'message' => $msg, 'user' => Auth::user() -> name]);
    	return redirect() -> action('SNSController@index');
    }

    public function getEdit(Request $request){
        $id = $request -> id;
        $data = Messagetable::find($id);
        return view('SNS.edit', ['data' => $data]);
    }

    public function postEdit(Request $request){
        $id = $request -> id;
        $data = Messagetable::find($id);
        $data -> title = $request -> input('title');
        $data -> message = $request -> input('message');
        $data -> save();
        return redirect() -> action('SNSController@index');
    }

    public function getDelete(Request $request){
        $id = $request -> id;
        $data = Messagetable::find($id);
        $data -> delete();
        return redirect() -> action('SNSController@index');
    }

    public function getDetail(Request $request){
        $id = $request -> id;
        $data = Messagetable::find($id);
        return view('SNS.detail', ['data' => $data]);
    }

}
