<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $rotas = ["login", "logar", "usuario.create", "usuario.store", "dicas.show"];

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('usuario')->check() && $request->routeIs($this->rotas))
            return redirect(route('home'));

        if( $request->routeIs($this->rotas))
            return $next($request);

        if (Auth::guard('usuario')->check())
            return $next($request);

        return redirect(route('login'));
    }
}
