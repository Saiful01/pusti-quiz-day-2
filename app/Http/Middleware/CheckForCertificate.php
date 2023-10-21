<?php

namespace App\Http\Middleware;

use Closure;

class CheckForCertificate
{
    public function handle($request, Closure $next)
    {
        // Check if the request URL contains "certificate.jpg"
        if (str_contains($request->url(), 'certificate.jpg')) {
            return redirect('/'); // Redirect to the home page
        }

        return $next($request);
    }
}
