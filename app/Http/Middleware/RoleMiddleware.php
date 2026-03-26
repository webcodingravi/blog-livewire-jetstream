<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        // 🔥 correct role check
        if (! $user->hasAnyRole($roles)) {
            abort(403);
        }

        if ($user->status !== 'approved') {
            return redirect()->route('author.pending');
        }

        return $next($request);
    }
}
