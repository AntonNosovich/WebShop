<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request)
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        /** @var User $user */
        $user = Auth::user();
        if ($user->hasAnyRole('manager','super-manager')){
            return $next($request);

        }
        return  redirect('/');

    }
}
