<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\HeroProduct;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function pageHome(){
        $data = HeroProduct::where('status', 'active')->orderBy('name', 'asc')->get();
        return view('new-view.home',[
            'data' => $data
        ]);
    }

    public function pageAbout()
    {
        return view('new-view.about');
    }

    public function getAllHero() {
        $data = HeroProduct::where('status', 'active')->orderBy('name', 'asc')->get();
    }

    public function gamePath($path){
        $string = $path;
        $findPath = str_replace('-', ' ', $string);
        $findPath = ucwords($findPath);
        $product = Product::where('game', $findPath)->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => $findPath,
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => $path.".jpg",
            'denomImg' => $path.".png" 
        ]);
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
