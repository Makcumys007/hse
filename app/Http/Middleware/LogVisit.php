<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hostname = gethostbyaddr($request->ip());
        $url = $request->fullUrl();
        Visit::create([
            'hostname' => $hostname,
            'visited_at' => now(),
            'url' => $url,
        ]);
        return $next($request);
    }
}
