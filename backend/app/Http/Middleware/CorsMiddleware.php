<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
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
        // Permite a origem da requisição (substitua pelo seu domínio do frontend)
        $response = $next($request);

        // Definindo os cabeçalhos CORS
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200'); // Remover o espaço extra
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        // Se for uma requisição OPTIONS, apenas retornamos a resposta com os cabeçalhos CORS
        if ($request->getMethod() == "OPTIONS") {
            return response()->json('OK');
        }

        return $response;
    }
}
