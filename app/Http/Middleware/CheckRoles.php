<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // array_slice mueve tantas posiciones como se le diga
        // func_get_args convierte en array todos los parametros pasados por argumento
        $roles = array_slice( func_get_args(), 2);

        if ( auth()->user()->hasRoles($roles) ) 
        {
            return $next($request);
        }
        
        return redirect('/');
    }
}
