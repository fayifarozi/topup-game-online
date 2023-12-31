<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use App\Exports\AdminsExport;
use Maatwebsite\Excel\Facades\Excel as Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::latest()->paginate(5);
        return view('new-admin.admin.admin-list', [
            'data' => $data
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
        return view('new-admin.admin.create');
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
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admin',
            'password' => 'required',
        ]);
        $validatedData['level'] = 'admin';

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profiles'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $validatedData['image'] = null;
        }
        Admin::create($validatedData);

        return redirect('/master/admin')->with('success', 'New admin has been added!');
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
        return view('new-admin.admin.update', [
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
        // dd($request->all());
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5|max:255',
        ];

        if ($request->email != $admin->email) {
            $rules['email'] = 'required|email|unique:admin';
        }
        $validatedData = $request->validate($rules);

        if ($request->level) {
            $validatedData['level'] = $request->level;
        }

        if ($request->hasFile('image')) {
            if($request->image_old){
                $imagePath = public_path('images/profiles/' . $request->image_old);
                // dd($imagePath);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $imageNewName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profiles'), $imageNewName);
            $validatedData['image'] = $imageNewName;
        }

        Admin::where('_id', $admin->_id)->update($validatedData);

        return redirect('/master/admin')->with('success', 'Update admin success!');
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
        return redirect('/master/admin')->with('success', 'Admin has been deleted!');
    }

    public function export()
    {
        return Excel::download(new AdminsExport, 'admin.xlsx');
    }
}
