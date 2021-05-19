<?php

// Name: NacosNoun Portal
// Version: 1.0
// Author: Abraham Peter
// Author URI: https://github.com/theclassical-dev
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
    } 

    public function index(Request $request){

    	return view('adminlogin');
    }

    public function login(Request $request){
        $this->validate($request,
            [
            'email' => 'required|string|email',
            'password' =>'required|string|min:8'
            ]
        );

        if (Auth::guard('admin')->attempt(['email' => $request->email, 
            'password' => $request->password], $request->remember)) {
                // dd([$request->email, $request->password]);
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    } 
}