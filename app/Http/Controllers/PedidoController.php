<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class PedidoController extends Controller
{
    public function index(){
        //Retornar todos os pedidos

    }
    public function store(Request $request){
        // salvar pedido no banco de dados




        //criar o json dos itens do carrinho que está na session
        try{

            $pedidoTotal = $request->all('valor_pedido');
            $items =session()->get('cart');
            $pedido = new Pedido();
            $pedido->status = 'Aberto';
            $pedido->items =json_encode($items );
            $pedido->users_id = auth()->user()->id;
            $pedido->total_pedido = $pedidoTotal['valor_pedido'] ;
            $pedido->save();
            session()->forget('cart');

          return redirect('/')->with('status','Seu pedido foi criado. O numero dele é '.$pedido->id);

        }catch ( Throwable  $e) {
            report($e);
            return redirect('/')->with('status','Falha');
        }

      //  return redirect('/')->with('status', $this->msg);




    }
}
