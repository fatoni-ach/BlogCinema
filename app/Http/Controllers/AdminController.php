<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\{Post, User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    protected function validator(Request $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index()
    {
        $context = array(
            "title"         => "Dashboard",
            "title_body"    => "dashboard"
        );
        return view('admin.index', compact('context'));
    }


    public function login(Request $request)
    {   
        if ($request->method() == "POST"){
            if (Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('admin');
            }
        }
        
        $context = array(
            "title"         => "Admin Login",
            "title_body"    => "Login"
        );
        return view('admin.login', compact('context'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function signup(Request $request)
    {
        if ($request->method() == "POST"){
            if($request['password'] == $request['password2']){
                User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password'  => Hash::make($request['password'])
                ]);
                return redirect('admin');
            }
        }
        $context = array(
            "title"         => "Admin Login",
            "title_body"    => "Login"
        );
        return view('admin.signup', compact('context'));
    }

    

}
