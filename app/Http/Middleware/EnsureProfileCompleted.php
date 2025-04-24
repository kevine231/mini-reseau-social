<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

public function handle($request, Closure $next)
{
    if (!$request->user() || !$request->user()->profile_completed) {
        return redirect()->route('profile.wizard.step1');
    }
    return $next($request);
}
