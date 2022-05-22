<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddalaware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //gobal
        $urlTenant = app(ManagerTenant::class);

        $tenant = $urlTenant->tenant();
        dd( $tenant );
        if(!$tenant && $request->url() != route('tenant.404')){
            return redirect()->route('tenant.404');
        }

        dd($tenant);

        return $next($request);
    }
}
