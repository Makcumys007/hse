<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Установите локаль по умолчанию
        $locale = 'en';

        // Если пользователь авторизован, проверьте его локаль
        if (Auth::check()) {
            $userLocale = Auth::user()->locale;
            if ($userLocale) {
                $locale = $userLocale;
            }
        }

        // Установите локаль приложения
        App::setLocale($locale);

        return $next($request);
    }
}
