<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function product()
    {   
        return view('hero-produk');
    }
    public function about()
    {
        return view('about');
    }
}
