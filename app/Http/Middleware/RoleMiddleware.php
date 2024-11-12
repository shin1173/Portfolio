<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'admin') { //ログインユーザー(role)が'admin'なら、リクエストを実行する
            return $next($request);
        }

        return redirect()->route('dashboard'); //ログインユーザー(role)が'admin'以外の場合、dashboardへリダイレクトする
    }
}
