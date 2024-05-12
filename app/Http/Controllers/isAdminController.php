<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class isAdminController extends Controller
{
    public function index(){
        return view('home');
    }
    // public function indexFront(){
    //     $Vroutes = VRoute::all();

    //     return view('front.list', ['routes' => $Vroutes]);

    // }
}
