<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('token');
        $result = JWTToken::VerifyToken($token);

        if (is_string($result) && $result === "Unauthorized") {
            return redirect('/userLogin')->with('error', 'Unauthorized access');
        }

        if (is_object($result) && isset($result->userEmail, $result->userID, $result->userRole)) {
            $request->headers->set('id', $result->userID);
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('role', $result->userRole);

            session(['userEmail' => $result->userEmail, 'userRole' => $result->userRole]);
            // return $next($request);
            if ($result->userRole === 'admin') {
                return $next($request);
            } else{
               return $next($request);
            }
        }

        return redirect('/userLogin')->with('error', 'Token invalid or expired');
    }
}
