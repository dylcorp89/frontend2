<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAuth
{
    /**
     * Gère l'accès en fonction de l'authentification de l'utilisateur via le token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si le token existe dans l'en-tête Authorization
         $token = session('jwt_token');

        if (!$token) {
            // Si le token n'est pas présent, redirige vers la page de connexion
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour accéder à cette section.');
        }



        return $next($request);
    }
}
