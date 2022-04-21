<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public static function boot(){
        parent::boot();
        static::addGlobalScope(new TenantScope);
        static::observe( new TenantObserver);
    }
    use HasFactory;

    protected $guarded =[];

}
