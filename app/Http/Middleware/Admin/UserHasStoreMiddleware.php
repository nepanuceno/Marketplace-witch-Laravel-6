<?php

namespace App\Http\Middleware\Admin;

use Closure;

class UserHasStoreMiddleware
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
        if(auth()->user()->store()->count() > 1){
            flash('Você já possui uma Loja!')->warning();
            return redirect()->route('admin.store.index');
        }
        return $next($request);
    }
}
