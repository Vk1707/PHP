<?php

namespace App\Http\Middleware;

use App\Models\Visitor as VisitorModel;
use Closure;
use Illuminate\Http\Request;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $visitorCount = VisitorModel::where('ip', $request->ip())->get()->count();

        // if($request->ip()=="127.0.0.1"){
        //     return response("Access Denied");
        // }

        if ($visitorCount == 0) {
            $visitor = new VisitorModel();
            $visitor->ip = $request->ip();
            $visitor->save();
        }
        return $next($request);
    }
}
