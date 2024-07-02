<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user();
            // dd($user);
            if ($user && isset($user->language)) {
                App::setLocale($user->language);
                Log::info('Locale set to user preferred language', ['user_id' => $user->id, 'language' => $user->language]);
            } else {
                Log::info('No user or no preferred language set');
            }
        } else if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
            Log::info('else chose');
        }

        return $next($request);
    }
}
