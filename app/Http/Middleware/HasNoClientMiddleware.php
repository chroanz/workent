<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasNoClientMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        return User::find(Auth::id())->client == null
            ? $next($request)
            : redirect()->route('home');
    }
}
