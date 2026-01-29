<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        if (
            !$request->session()->has('age') ||
            $request->session()->get('age') < 18
        ) {
            return redirect('/age')
                ->with('error', 'Bạn chưa đủ 18 tuổi');
        }

        return $next($request);
    }
}
