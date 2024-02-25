<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

class ArtistChecking {
    public function handle($request, \Closure $next, $guard = null) {
        if (Auth::check() && Auth::user()->is_artist == true) {
            return $next($request);
        }
        abort(403);
    }
}