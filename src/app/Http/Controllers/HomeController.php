<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    
    

    public function index(){
        return view('public', ['title' => 's22_balidani']);
    }

    public function index1(){
        return view('public1', ['title' => 's22_balidani']);
    }
}
