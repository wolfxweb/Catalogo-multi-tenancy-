<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listar(){
        $clientes = User::all();
        return view('pages.cliente.lista',compact('clientes'));
    }
}
