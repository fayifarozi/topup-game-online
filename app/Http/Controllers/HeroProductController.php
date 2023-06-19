<?php

namespace App\Http\Controllers;

use App\Models\HeroProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HeroProductController extends Controller
{
    public function index()
    {
        $data = HeroProduct::orderBy('name', 'asc')->get();
        return view('new-admin.product-hero.hero-list',[
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('new-admin.product-hero.create',[
            'hero_id' => fake()->unique()->regexify('[A-Z]{3}[0-9]{5}')
        ]);
    }

    public function edit(HeroProduct $hero_product)
    {
        return view('new-admin.product-hero.update',[
            'data' => $hero_product
        ]);
    }

    public function updateStatus(Request $request)
    {
        $data = HeroProduct::findOrFail($request->hero_product);
           
        if ($data !== null){
            $status = ($request->status === 'active') ? 'active' : 'deactive';
            $data->update([
                'status' => $status,
            ]);
    
            $toastMessage = [
                'type' => 'success',
                'message' => 'Updated Status Successfully'
            ];
            Session::flash('toast', $toastMessage);
            return redirect(route('hero-product.index'));
        } else {
            $toastMessage = [
                'type' => 'error',
                'message' => 'Updated Status Error'
            ];
            Session::flash('toast', $toastMessage);
            return redirect(route('hero-product.index'));
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'hero_id' => 'required|unique:hero_product',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        
        $string = $request->name;
        $path = preg_replace('/[^a-zA-Z0-9]+/', '-', $string);
        $validatedData['path'] = strtolower($path);

        if($request->file('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/core/product-tiles'), $imageName);
            $validatedData['image'] = $imageName;
        }
        
        $validatedData['status'] = 'active';
        // dd($validatedData);
        HeroProduct::create($validatedData);
        $toastMessage = [
            'type' => 'success',
            'message' => 'Add Hero Product Successfull'
        ];
        Session::flash('toast', $toastMessage);
        return redirect(route('hero-product.index'));
    }

    public function update(Request $request, HeroProduct $hero_product)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($request->name != $hero_product->name) {
            $string = $request->name;
            $path = preg_replace('/[^a-zA-Z0-9]+/', '-', $string);
            $validatedData['path'] = strtolower($path);
        }

        if ($request->hasFile('image')) {
            if($request->image_old){
                $imagePath = public_path('images/core/product-tiles/' . $request->image_old);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $imageNewName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/core/product-tiles'), $imageNewName);
            $validatedData['image'] = $imageNewName;
        }
        
        HeroProduct::where('_id', $hero_product->_id)->update($validatedData);
        $toastMessage = [
            'type' => 'success',
            'message' => 'Updated Successfull'
        ];
        Session::flash('toast', $toastMessage);
        return redirect(route('hero-product.index'));
    }
}
