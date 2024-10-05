<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCityFromSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();
        
        if (!empty($segments)) {
            $possibleCity = $segments[0];
            $city = City::where('slug', $possibleCity)->first();
            
            if ($city) {
                session(['current_city' => $city]);
                return redirect(implode('/', array_slice($segments, 1)));
            }
        }
        
        if (!session('current_city')) {
            $defaultCity = City::first();
            if ($defaultCity) {
                session(['current_city' => $defaultCity]);
            }
        }
        
        return $next($request);
    }
}
