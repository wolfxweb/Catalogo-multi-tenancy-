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

    public function userPedidosPaginadoAberto(){
       $pedidos = Pedido::with('userPedidos')->where('status','Aberto')->paginate(10);
       return $pedidos;
    }

    public function userPedidosFiltros($coluna, $informacao, $date = false){
        $pedidos = Pedido::with('userPedidos')->where($coluna,$informacao)->paginate(1000);
        return $pedidos;
     }
    public function userPedidosFiltrosData($coluna, $informacao){
        $pedidos = Pedido::with('userPedidos')->whereDate($coluna,$informacao)->paginate(1000);
        return $pedidos;
     }
}