<?php
namespace  App\Traits\user;

use App\Models\Pedido;
use App\Models\User;
use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\DB;

trait userTrait{

    public function idTenantLogado(){
        return app(ManagerTenant::class)->tenantId();
    }
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
    public function verificarSeExisteAdminCadastrado(){
        $tenantId =  $this->idTenantLogado();
        return DB::table('nive_acesso_users')->where('nivel_acesso','admin')->where('tenant_id',$tenantId)->count();
    }
    public function niverAcessoUsuarioLogado(){
        return User::find(auth()->user()->id)->nivelAcesso->nivel_acesso;
    }
}