<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

public function handle($request, Closure $next, $role)
{
    if (!$request->user() || $request->user()->role !== $role) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    return $next($request);
}
