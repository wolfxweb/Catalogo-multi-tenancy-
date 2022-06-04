<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\user\userTrait;
use App\Traits\tenant\tenantTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    use userTrait;
    use tenantTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pedidos =[];

        switch ($this->niverAcessoUsuarioLogado()) {
            case 'admin':
                $pedidos =  $this->getPedidos();
                break;
            case 'cliente':
                $pedidos = $this->userPedidosPaginadoAberto();
                break;
            case 'Master':
              //  $pedidos = Tenant::all();
                break;
            default:
                # code...
                break;
        }
     
        return view('home', compact('pedidos'));
    }
}
