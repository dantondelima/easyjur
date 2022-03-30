<?php

namespace App\Http\Middleware;

use App\Services\Interfaces\DicaServiceInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUsuarioPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $rotas = ["dicas.show", "dicas.create", "dicas.index", "dicas.store"];

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('usuario')->check() && $request->routeIs($this->rotas))
            return $next($request);

        if(Auth::guard('usuario')->check() && Auth::guard('usuario')->user()->id != $request->dica->usuario_id)
            return redirect(route('dicas.index'))->with('error', 'Você não tem permissão executar essa ação');

        return $next($request);
    }
}
