<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request)
    {   
        $credentials = Admin::where('email','=',$request->input('email'))->first();
        if($credentials){
            // $x = Hash::check($request->input('password'),$credentials->password);
            if(Hash::check($request->input('password'),$credentials->password)){
                session()->put('login','True');
                session()->put('idLogin','True');
                return redirect('/master');
            }else{
                return back()->with('loginError', 'Login failed!!');
            }
        }else{
            return back()->with('loginError', 'Login failed!!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
