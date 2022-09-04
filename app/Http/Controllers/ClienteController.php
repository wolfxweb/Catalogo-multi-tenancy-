<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\user\userTrait;

class ClienteController extends Controller
{
    use userTrait;
    public function listar(){
       $clientes = $this->listarTodosOsUsuariosDoTenant();
       return view('pages.cliente.lista',compact('clientes'));
    }
}
