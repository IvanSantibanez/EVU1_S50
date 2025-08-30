<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException $e) {
            return $this->unauthorizedResponse($request, 'Token inválido');
        } catch (TokenExpiredException $e) {
            return $this->unauthorizedResponse($request, 'Token expirado, inicia sesión nuevamente');
        } catch (JWTException $e) {
            return $this->unauthorizedResponse($request, 'Sin autorización');
        }

        return $next($request);
    }

    private function unauthorizedResponse(Request $request, string $message)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'error' => $message
            ], 401);
        }

        return redirect()->route('login')->withErrors(['auth' => $message]);
    }
}
