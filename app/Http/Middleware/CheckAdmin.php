<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::whereId(auth()->id())->first();
        if ($user->isAdmin == true) {
           // dd($user);
            return redirect('/admin');
        }

        return $next($request);
    }
}
