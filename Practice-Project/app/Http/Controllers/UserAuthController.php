<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    function profile(Request $req){
        if (!session()->has('user')) {
            return redirect('login');
        }

        return view('profile');
    }

    function loginForm(Request $req){
        if (session()->has('user')) {
            return redirect('profile');
        }

        return view('login');
    }

    function login(Request $req)
    {
        $userId = $req->userid;
        $req->session()->put('user', $userId);
        return redirect('profile');
    }
}
