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
    	$data = MessageTable::where('user', Auth::user() -> user_id) -> orWhere('security', true) -> orderBy('created_at', 'desc') -> get();
        foreach ($data as $val) {
            if($val -> image_url != null){
               $val -> image_url = explode(',', $val -> image_url); 
                logger($val -> image_url);
            }

            if($val -> visit_user != null){
                $val -> visit_user = explode(',',$val -> visit_user);
            }
        }
        // logger($data);
    	return view('SNS.sns_top', ['data' => $data, 'flag' => false]);
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
            $contents = collect(Storage::disk('google') -> listContents('/',false));
            $dir = $contents -> where('type','=','dir')
                ->where('filename','=','image')
                ->first();
            foreach ($files as $file) {
                 $newFileName = sprintf("%s.%s",md5(time().$file -> getClientOriginalName()), $file -> getClientOriginalExtension());
                 Storage::disk('google') -> put($dir['path'].'/'.$newFileName, file_get_contents($file));
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
        if($data -> user != Auth::user() -> user_id){
            return redirect() -> back();
        }
        $contents = collect(Storage::disk('google')->listContents('/', false));
        $dir = $contents ->where('type','=','dir')
                ->where('filename','=','image')
                ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], false));
        if($data -> image_url != null){
            $images = explode(',', $data -> image_url);
            foreach($images as $image){
                $file = $contents
                        ->where('type', '=', 'file' )
                        ->where('filename', '=', pathinfo($image, PATHINFO_FILENAME))
                        ->where('extension', '=', pathinfo($image, PATHINFO_EXTENSION))
                        ->first();
                $rawData = Storage::disk('google') -> delete($file['path']);
            }
        }

        $data -> delete();
        return redirect() -> action('SNSController@index');
    }

    public function getDetail(Request $request){
        $id = $request -> id;
        $data = Messagetable::find($id);
        $flag = false;
        if($data -> visit_user == null){
            $data -> visit_user = Auth::user() -> user_id;
            $data->save();
        }
        else{
            $visits=explode(',', $data -> visit_user);
            foreach($visits as $visit){
                if($visit == Auth::user() -> user_id){
                    $flag = true;
                    break;
                }
            }
            if(!$flag){
                $data -> visit_user =$data -> visit_user. ','. Auth::user() -> user_id;
                $data -> save(); 
            }
        }
        $images = explode(',' , $data -> image_url);
        return view('SNS.detail', ['data' => $data, 'images' => $images]);
    }

    public function getAvater($avaterImage){
        // $path = storage_path('images/avater/'.$avaterImage);
        // $file = File::get($path);
        // $type = File::mimeType($path);

        // $response = Response::make($file, 200);
        // $response = header("Content-Type", $type);
        $contents = collect(Storage::disk('google')->listContents('/', false));
        $dir = $contents ->where('type','=','dir')
                ->where('filename','=','avater')
                ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], false));
        $file = $contents
                ->where('type', '=', 'file' )
                ->where('filename', '=', pathinfo($avaterImage, PATHINFO_FILENAME))
                ->where('extension', '=', pathinfo($avaterImage, PATHINFO_EXTENSION))
                ->first();
    	$rawData = Storage::disk('google') -> get($file['path']);
        // logger($rawData);
        return response($rawData, 200)
                ->header('Content-Type', $file['mimetype'])
                ->header('Content-Disposition', "attachment; filename='$avaterImage'");
    }

    public function getImage($images){
        // $response = Storage::disk('image') -> get($images);
        // return $response;
        $contents = collect(Storage::disk('google')->listContents('/', false));
        $dir = $contents ->where('type','=','dir')
                ->where('filename','=','image')
                ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], false));
        $file = $contents
                ->where('type', '=', 'file' )
                ->where('filename', '=', pathinfo($images, PATHINFO_FILENAME))
                ->where('extension', '=', pathinfo($images, PATHINFO_EXTENSION))
                ->first();
        $rawData = Storage::disk('google') -> get($file['path']);
        // logger($rawData);
        return response($rawData, 200)
                ->header('Content-Type', $file['mimetype'])
                ->header('Content-Disposition', "attachment; filename='$images'");
    }

}
