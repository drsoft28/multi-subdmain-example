<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Subdomain;
class CheckSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost(); // e.g., "subdomain.restaurant.test"
        $isSubdomain = preg_match('/^[a-z0-9]+\.restaurant\.test$/', $host);

        if ($isSubdomain) {
            $subdomain = explode('.', $host)[0];
            $subdomain_table = Subdomain::whereRaw('name=?',[$subdomain])->first();
            if(!$subdomain_table) return abort(404);
            $request->merge(['subdomain' => $subdomain]); // Pass subdomain to controller
        }

        return $next($request);
    }
}
