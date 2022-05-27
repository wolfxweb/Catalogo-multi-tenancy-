<?php
namespace  App\Traits\user;

use App\Models\Pedido;
use App\Models\User;

trait userTrait{

    public function userLogadoInfo(){

        $user = User::find(auth()->user()->id)->nivelAcesso;
        $userLogado =[
            "nivelAcesso"=> $user->nivel_acesso,
            "info"=>$user->info,
            'tenant_id'=> $user->tenant_id,
            "user_id"=>$user->users_id
        ];
        return $userLogado;
    }

    public function userPedidos(){   
       $pedidos = Pedido::with('userPedidos')->get();
       return $pedidos;
    }
}