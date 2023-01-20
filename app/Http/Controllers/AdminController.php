<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Admin::limit(5)->get();
        // $data = Admin::all();
        $data = Admin::latest()->paginate(5);
        return view('master.admin.admin-list',[
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:5|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('admin-images');
        } else {
            $validatedData['image'] = null;
        }

        Admin::create($validatedData);

        return redirect('/master/admin')->with('success','New admin has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return $admin;
        // dd($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('master.admin.update',[
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {   
        // dd($admin);
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            'image' => 'image'
        ];

        if($request->email != $admin->email){
            $rules['email'] = 'required|email|unique:admin';
        }
        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('admin-images');
        }
        // dd($validatedData);

        Admin::where('_id',$admin->_id)
            ->update($validatedData);

        return redirect('/master/admin')->with('success','Update admin success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Storage::delete($admin->image);
        Admin::destroy($admin->_id);
        return redirect('/master/admin')->with('success','Admin has been deleted!');
    }
}
