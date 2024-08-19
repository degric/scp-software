<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnUserType
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
        if (Auth::check()) {
            $user = Auth::user();

            // Verificar la ruta actual para evitar redirección innecesaria
            $currentRoute = $request->route()->getName();

            // Redirigir si el usuario es admin y está intentando acceder a una ruta de enclab
            if ($user->tipo_usuario === 'admin' && str_starts_with($currentRoute, 'enclab')) {
                return redirect('/admin');
            }

            // Redirigir si el usuario es enclab y está intentando acceder a una ruta de admin
            if ($user->tipo_usuario === 'enclab' && str_starts_with($currentRoute, 'admin')) {
                return redirect('/enclab');
            }
        }

        return $next($request);
    }
}
