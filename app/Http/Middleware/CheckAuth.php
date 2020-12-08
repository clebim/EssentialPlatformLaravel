<?php

namespace App\Http\Middleware;

use App\AccessGroup;
use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissionID)
    {
        if ( !auth()->check()) {
            return redirect()->route('login');
        }
        
        // Verificar se o usuário possui permissão para acessar a página

        $privilege = AccessGroup::where([['page_id', $permissionID], ['privilege_id', auth()->user()->privilege_id ]])->first();

        if(!isset($privilege)) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
