<?php
namespace  App\Traits\modelTrait;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait bootTrait{

    public static function boot(){
        parent::boot();
        static::addGlobalScope(new TenantScope);
        static::observe( new TenantObserver);
    }
}