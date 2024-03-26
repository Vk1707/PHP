<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $name = "Vivek";
        $login = true;
        $skills =  ['C','C++','Java','PHP'];
        $favoriteSkills = 'C++';
        return response('Hello World')->cookie(
            'name', 'value', $name,$login,$skills,$favoriteSkills
        );;
    }

    public function account(){
        return view('account');
    }

    public function contact(){
        return view('contact');
    }
    
    public function test(){
        $namet ="Vivek";
        $isActive = true;
        $hasError = false;
        $skills = ['C','C++','Java','PHP'];
        $favoriteSkill = 'C++';

        $products = [];

        $products[] = ['name'=>'Iphone 13', 'img'=>'', 'price'=>'65999'];
        $products[] = ['name'=>'Oneplus 10r', 'img'=>'', 'price'=>'45999'];

        return view('test', compact('namet','isActive','hasError','skills','favoriteSkill','products'));
    }

    public function login(){
        return view('account.login');
    }
}
