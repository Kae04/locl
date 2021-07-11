<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ['name' => 'taro', 'email' => 'taro@example.com'],
            ['name' => 'jiro', 'email' => 'jiro@example.com'],
            ['name' => 'saburo', 'email' => 'saburo@example.com']
        ];
        $request->merge(['data'=>$data]);
        return $next($request);
    }
}
