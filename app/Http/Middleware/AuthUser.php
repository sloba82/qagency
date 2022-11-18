<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ClientInfo;
use Illuminate\Http\Request;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $clientInfo = new ClientInfo();

        if($clientInfo->auth){
            return $next($request);
        }

         return redirect()->route('auth.index');

        
    }
}
