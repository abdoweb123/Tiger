<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SetUserLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('client')->check()) {
        $user = Auth::user();
        if ($user && isset($user->language)) {
            app()->setLocale($user->language);
            Log::info('Locale set to user preferred language', ['user_id' => $user->id, 'language' => $user->language]);
        } 
        }else {
            Log::info('No user or no preferred language set');
        }

        return $next($request);
    }
}
