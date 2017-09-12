<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function createRegister(Request $request){
        $this->validate($request,[
                'name' => 'required|string',
                'user_id' => 'required|string|alpha|unique:users,user_id',
                'password' => 'required|string|confirmed',
                'avater_file' => 'file',
                ]);
        $usr = User::create([
            'name' => $request -> input('name'),
            'user_id' => $request -> input('user_id'),
            'password' => bcrypt($request -> input('password')),
            ]);

        if($request->hasFile('avater_file')){
            $file = $request -> file('avater_file');
            $newFileName = sprintf("%s.%s",md5(time().$file -> getClientOriginalName()), $file -> getClientOriginalExtension());
            // Storage::disk('avater') -> put($newFileName);

            $file->move(storage_path('images/avater'), $newFileName);
            $usr -> avater_file = $newFileName;
        }
        else{
            $usr -> avater_file = 'avater_error.jpg';
        }
        $usr -> save(); 
        Auth::guard()->login($usr);
        if(Auth::check()){
            return redirect() -> action('SNSController@index');
        }



        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
