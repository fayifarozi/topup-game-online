<?php

namespace App\Http\Controllers;
use App\Models\Order;
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
    public function search()
    {
        $data = Order::with('product')->latest();

        if(request('search')){
            $data->where('order_code','like','%'.request('search').'%')
            ->orWhere('user_game_id','like','%'.request('search').'%')
            ->orWhere('email','like','%'.request('search').'%')
            ->orWhere('phone','like','%'.request('search').'%')
            ->orWhere('product.game','like','%'.request('search').'%');
        }
        return view('search');
    }
}
