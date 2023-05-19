<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Expose-Headers', 'Authorization', 'Content-Disposition');
        $response->headers->set('Access-Control-Allow-Origin', '*', 'http://localhost:8080','http://localhost','https://edu.pilateswien.org');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');

        //return $response->withHeaders($headers);
        return $response;
    }
}
