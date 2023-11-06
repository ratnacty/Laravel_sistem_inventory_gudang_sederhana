<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function login()
    {
        return view('session.login');
    }

    public function loginProses(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $dataLogin = [
            'username' => $request->username,
            'password' => $request->password,
            
           
        ];

       

        if(Auth::attempt($dataLogin)){
          
            $request->session()->regenerate();
            return redirect()->intended('/')->with(['success' => 'Login Successfull']);
        }else{
            return redirect()->back()->with(['error' => 'Login Failed. Please check your username or password']);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    

        return redirect()->route('login')->with(['success' => 'Logout has successfull']);
    }



    public function register()
    {
        return view('session.register');
    }



    public function registerProses(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
           
        ]);

        User::create($requestData);

        return redirect()->back()->with(['success' => 'register was successfull, use data to login']);
    }

}
