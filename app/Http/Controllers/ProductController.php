<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Generator;
use Illuminate\Auth\Events\Validated;

class ProductController extends Controller
{
    // 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($data);
        $data = Product::orderBy('game', 'asc');
        if(request('search')){
            $data->where('kode_id','like','%'.request('search').'%')
            ->orWhere('game','like','%'.request('search').'%')
            ->orWhere('price','like','%'.request('search').'%')
            ->orWhere('item','like','%'.request('search').'%');
        }
        return view('master.product.product-list',[
            'data' => $data->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('master.product.create',[
            'kode_id' => fake()->unique()->regexify('[A-Z]{3}[0-9]{5}')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'game' => 'required|max:255',
            'kode_id' =>'required|unique:product',
            'item' => 'required',
            'price' => 'required'
        ]);
        $validatedData['status'] = "active";
        
        Product::create($validatedData);

        return redirect('/master/product')->with('success','New product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {  
        return view('master.product.update',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'game' => 'required|max:255',
            'item' => 'required|max:255',
            'price' => 'required|min:5|max:255',
            'status' => 'required'
        ]);

        Product::where('_id',$product->_id)
        ->update($validatedData);

        return redirect('/master/product')->with('success','Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->_id);

        return redirect('/master/product')->with('success','Product has been deleted!');
    }
}
