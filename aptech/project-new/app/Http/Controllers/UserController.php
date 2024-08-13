<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:15',
            'interests' => 'required|array',
            'country' => 'required',
            'gender' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->interests = implode(', ', $request->interests);
        $user->country = $request->country;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }
}
