<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {   
        // Verifica se o usuário está autenticado e se é admin
        if (!auth::check() || auth::user()->vc_tipo !== 'admin') {
            // Redireciona ou retorna erro 403 (Forbidden)
            return redirect()->back()->with('error', 'Acesso não autorizado. Área restrita a administradores.');
        }

        return $next($request);
    }
}
