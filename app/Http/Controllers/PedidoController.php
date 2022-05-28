<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;
use App\Traits\user\userTrait;
use DateTime;

class PedidoController extends Controller
{
  use userTrait;
  public function index()
  {
    //Retornar todos os pedidos

  }
  public function store(Request $request)
  {
    // salvar pedido no banco de dados
    //criar o json dos itens do carrinho que está na session
    try {

      $pedidoTotal = $request->all('valor_pedido');
      $items = session()->get('cart');
      $pedido = new Pedido();
      $pedido->status = 'Aberto';
      $pedido->items = json_encode($items);
      $pedido->users_id = auth()->user()->id;
      $pedido->total_pedido = $pedidoTotal['valor_pedido'];
      $pedido->save();
      session()->forget('cart');

      return redirect('/')->with('status', 'Seu pedido foi criado. O numero dele é ' . $pedido->id);
    } catch (Throwable  $e) {
      report($e);
      return redirect('/')->with('status', 'Falha');
    }

    //  return redirect('/')->with('status', $this->msg);
  }

  public function localizarPedido(Request $request)
  {
    $filtro = $request->all();
    $statusArray = [2,3];
    $data = [5];
  // dd( $filtro);
    if (empty($filtro['selLocalizar'])) {
      return redirect('/home')->with('status', 'Selecione o tipo de filtro para poder realizar pesquisa. ')->with('classAlerta', 'alert-warning  text-dark');
    }
    if(isset($filtro['selLocalizar']) && !in_array($filtro['selLocalizar'],$statusArray) && !in_array($filtro['selLocalizar'],$data)){
      if (empty($filtro['txtLocalizar'])) {
        return redirect('/home')->with('status', 'Preencha o campo de pesquisa. ')->with('classAlerta', 'alert-warning  text-dark');
      }
    }
    if(empty($filtro['data']) &&  in_array($filtro['selLocalizar'],$data)){
      return redirect('/home')->with('status', 'Selecione uma data para pesquisar. ')->with('classAlerta', 'alert-warning  text-dark');
    }
    switch ($filtro['selLocalizar']) {
      case '1':
           $pedidos = $this->userPedidosFiltros('id',$filtro['txtLocalizar']);
           return view('home', compact('pedidos'));
        break;
      case '2':
        $pedidos = $this->userPedidosFiltros('status','Aberto');
        return view('home', compact('pedidos'));
        break;
      case '3':
        $pedidos = $this->userPedidosFiltros('status','Finalizado');
        return view('home', compact('pedidos'));
        break;
      case '4':
         dd('4');
        break;
      case '5':
        $data = DateTime::createFromFormat('d/m/y',$filtro['data']);
        $pedidos = $this->userPedidosFiltrosData('created_at', $filtro['data']);
      ///  dd($pedidos);
        return view('home', compact('pedidos'));
       
        break;
      default:
      return redirect('/home')->with('status', 'Termo pesquisado não existe')->with('classAlerta', 'alert-warning  text-dark');
        break;
    }
  }
}
