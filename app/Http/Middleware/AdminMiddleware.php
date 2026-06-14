<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Проверяем флаг is_blocked
        if ($user->is_blocked) {
            abort(403, 'Пользователь заблокирован.');
        }

        if (! ($user->role === 'admin' || ($user->email === 'kemalatayew913@gmail.com'))) {
            abort(403, 'Доступ запрещён.');
        }

        return $next($request);
    }
}
