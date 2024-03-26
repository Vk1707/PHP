<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie as Cookie;

class CookieController extends Controller
{
    public function cookieDemo(Request $req){
        $city = Cookie::get('city');
        return view('cookie-demo',compact('city'));  
    }

    public function addCookie(Request $req){
        $city = $req->city;
        //return redirect('cookiedemo')->cookie('city',$city,3000);
        
        Cookie::queue('city',$city);
        return redirect('cookie-demo');
    }

    public function deleteCookie(Request $req){
        Cookie::expire('city');
        return redirect('cookie-demo');
    }
}
