<?php

namespace App\Providers;

use App\Tenant\ManagerTenant;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use App\Traits\user\userTrait;

class AppServiceProvider extends ServiceProvider
{
    use userTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
                
        Paginator::useBootstrap();

    
        Blade::if('tenantAdm', function(){
            $tenant = app(ManagerTenant::class);
            return $tenant->isDominioPrinicipal();
        });
        Blade::if('tenant', function(){
            $tenant = app(ManagerTenant::class);
            return !$tenant->isDominioPrinicipal();
        });
        Blade::if('nivelUsuarioLogado', function($nivel = "cliente"){
            $nivelAUX =  $this->niverAcessoUsuarioLogado();
           // var_dump($nivelAUX);
            return  $nivelAUX == $nivel;
        });
     



    }
}
