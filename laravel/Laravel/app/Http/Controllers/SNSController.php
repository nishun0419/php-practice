<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\MessageTable;

class SNSController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
    }
    public function index(){
    	$data = MessageTable::where('user', Auth::user() -> user_id) -> orWhere('security', true) -> orderBy('updated_at', 'desc') -> get();
        foreach ($data as $val) {
            if($val -> image_url != null){
               $val -> image_url = explode(',', $val -> image_url); 
                logger($val -> image_url);
            }
        }
        logger($data);
    	return view('SNS.sns_top', ['data' => $data]);
    }


    public function post(Request $request){
        $tit = $request -> input('title');
    	$msg = $request -> input('message');
        $security = true;
        if($request -> input('security') == 'private'){
            $security = false;
        }
    	$msTab = MessageTable::create(['title' => $tit, 'message' => $msg, 'user' => Auth::user() -> user_id, 'security' => $security]);
    	logger($request -> file('inputImage'));
        if($request -> hasFile('inputImage')){
            $image_url = null;
            $files = $request -> file('inputImage');
            foreach ($files as $file) {
                 $newFileName = sprintf("%s.%s",md5(time().$file -> getClientOriginalName()), $file -> getClientOriginalExtension());
                 $file -> move(storage_path('images/image'), $newFileName);
                 if($image_url == null){
                    $image_url = $newFileName;
                 }
                 else{
                 	$image_url = $image_url. ',' .$newFileName;
                 } 
             }
             $msTab -> image_url = $image_url;
             $msTab -> save();
        }
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
        $images = explode(',' , $data -> image_url);
        return view('SNS.detail', ['data' => $data, 'images' => $images]);
    }

    public function getAvater($avaterImage){
        // $path = storage_path('images/avater/'.$avaterImage);
        // $file = File::get($path);
        // $type = File::mimeType($path);

        // $response = Response::make($file, 200);
        // $response = header("Content-Type", $type);
    	$response = Storage::disk('avater') -> get($avaterImage);
        return $response;
    }

    public function getImage($images){
        $response = Storage::disk('image') -> get($images);
        return $response;
    }

}
