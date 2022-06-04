<?php
namespace  App\Traits\tenant;

use App\Models\Pedido;
use App\Traits\user\userTrait;


trait tenantTrait{

    use userTrait;

    public function getPedidos(){
        return Pedido::paginate(10);
    }
}