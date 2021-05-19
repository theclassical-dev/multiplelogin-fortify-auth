<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Admin;
 use Validator,Redirect,Response;
 use Illuminate\Support\Facades\Hash;

class AdminRegController extends Controller
{
    public function register(Request $request)
    {
        if(isset($_POST['register'])) 
        {
                $request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'password'=>'required|string',   
                'password_confirmation'=>'required|string',   
            ]);
        
            $user = Admin::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);
            if ($user) {
                return redirect()->route('admin.dashboard');
            }
        }
       return view('adminregister');
    }
}
