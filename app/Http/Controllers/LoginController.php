<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
    	return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $checkUser = User::where('username', $request->username)
            ->get()->first();

        if (!empty($checkUser)) {
            if (Hash::check($request->password, $checkUser->password)) {
                $request->session()->put('auth_user', $checkUser->toArray());
                return redirect('/');
            }else{
                return redirect('/login')->with('error', 'Incorrect Password!');
            }
        }else{
            return redirect('/login')->with('error', 'Username not Found!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/');
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $checkUser = User::where('username', $request->username)
            ->get()->first();
        if (!empty($checkUser)) {
            return redirect()->back()->with('error', 'Username already exists!');
        }

        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->roles    = 'user';
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->points   = 0;
        $user->save();

        return redirect('/login')->with('success', 'Register success! Please Login to continue!');

    }
}