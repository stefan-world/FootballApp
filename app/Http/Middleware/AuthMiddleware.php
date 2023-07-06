<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!$this->verifica()) {
            return redirect('login');
        }

        return $next($request);
    }

    private function verifica()
    {
        if (session()->has('username')) {
            return session('username');
        }

        return false;
    }
}