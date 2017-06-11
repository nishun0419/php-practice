<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MyTable;

class HeloController extends Controller
{
    public function index(Request $request){
    	$data = MyTable::all();
    	return view('helo', ['message' => 'Mytable List', 'data' => $data]);
    }

    public function postIndex(Request $request){
    	$res = "You typed:". $request -> input('str');
    	return view('helo', ['message' => $res]);
    }

    public function getNew(){
    	return view('new', ['message' => 'Mytable Create']);
    }

    public function postNew(Request $request){
    	$name = $request -> input('name');
    	$mail = $request -> input('mail');
    	$age = $request -> input('age');
    	$data = array(
    		'name' => $name,
    		'mail' => $mail,
    		'age' => $age
    			);
    	MyTable::create($data);
    	return redirect() -> action('HeloController@index');
    }

    public function getUpdate(Request $request){
    	$id = $request -> id;
    	$data = MyTable::find($id);
    	$msg = 'MyTable Update [id = '. $id . ']';
    	return view('update', ['message' => $msg, 'data' => $data]);
    }

    public function postUpdate(Request $request){
    	$id = $request -> input('id');
    	$data = MyTable::find($id);

    	$data -> name = $request -> input('name');
    	$data -> mail = $request -> input('mail');
    	$data -> age = $request -> input('age');
    	$data -> save();

    	return redirect() -> action('HeloController@index');

    }

    public function getDelete(Request $request){
    	$id = $request -> id;
    	$data = MyTable::find($id);
    	$data -> delete();
    	return redirect() -> action('HeloController@index');
    }
}
