<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class groupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //echo "<h1 class='text-white bg-danger p-2 text-center'>Group Middleware</h1>";
        if($request->input("age") >= 18){
            echo "<h1 class='text-white bg-success p-2 text-center'>Valid Age</h1>";
        }else{
            echo "<h1 class='text-white bg-danger p-2 text-center'>Invalid Age</h1>";
        }
        return $next($request);
    }
}
