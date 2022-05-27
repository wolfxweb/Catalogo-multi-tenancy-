<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\modelTrait\bootTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use bootTrait;
  
  

    /*
    public static function boot(){
        parent::boot();
        static::addGlobalScope(new TenantScope);
        static::observe( new TenantObserver);
    }
*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nivelAcesso(){
        return $this->hasOne(NiveAcessoUser::class, 'users_id');
    }
    public function listaPedidos(){// um usuario pode ter muitos pedidos
        return $this->hasMany(Pedido::class, 'users_id');
    }
}
