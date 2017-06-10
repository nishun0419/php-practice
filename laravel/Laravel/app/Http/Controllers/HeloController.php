<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeloController extends Controller
{
    public function __invoke(){
    	return view('helo', ['message' => 'Hello!']);
    }
}
