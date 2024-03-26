<?php

namespace App\Http\Controllers;
use App\Events\MessageEvent;
use Illuminate\Http\Request;

class BroadcastingController extends Controller
{
    public function subscribe(Request $request){
        return view('broadcasting.subscribe');
    }

    public function broadcast(Request $request){
        $data = [
            'message'=>'Hello world from laravel',
            'time'=>now()
        ];

        event(new MessageEvent($data));
        return response("Broadcast sent");
    }

    public function adminsubscribe(Request $request){
        return view('broadcasting.admin-subscribe');
    }

}
