<?php

namespace App\Http\Controllers;

use App\Models\HeroProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HeroProductController extends Controller
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


    public function store(Request $request){
        $validatedData = $request->validate([
            'hero_id' => 'required|unique:hero_products',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        $string = $request->name;
        $path = preg_replace('/[^a-zA-Z0-9]+/', '-', $string);
        $validatedData['path'] = strtolower($path);

        if($request->file('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        
        $validatedData['status'] = 'active';
        // dd($validatedData);
        HeroProduct::create($validatedData);
        return 200;
    }
}
