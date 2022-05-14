<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CarinhoController extends Controller
{
    public function addCart(Request $resquest)
    {


      //  dd($resquest->get('produto'));
        $produto = $resquest->get('produto');

        if(session()->has('cart.'.$produto['id'])){

            $produto  = session()->get('cart.'.$produto['id']);

            $produto['qtd']++;

            session()->forget('cart'.$produto['id']);

            session()->put('cart.'.$produto['id'],$produto );

        }else{

           session()->put('cart.'.$produto['id'],$produto);

        }
        return redirect('/')->with('status','Produto adicioando com sucesso');
    }

    public function ajustCart($item , $acao ){

        $msg ='Produto adicioando com sucesso';

        switch ($acao) {

            case 'E':
                  $produto  = session()->get('cart.'.$item);
                  session()->forget('cart.'.$item);
                  $this->msg ='Excluido com sucesso';
                break;

            case 'A':
                    $produto  = session()->get('cart.'.$item);
                    $produto['qtd']++;
                    session()->forget('cart'.$produto ['id']);
                    session()->put('cart.'.$produto ['id'],$produto);
                    $this->msg='Produto adicioando com sucesso';
                break;

            case 'D':
                  /// $this->ajustarQuantidade($item,true);

                    $produto  = session()->get('cart.'.$item);
                    $produto['qtd']--;
                    if($produto['qtd'] > 1 ){
                        session()->forget('cart'.$produto ['id']);
                        session()->put('cart.'.$produto ['id'],$produto);
                        $this->msg ='Produto diminuido com sucesso';
                    }else{
                        $produto  = session()->get('cart.'.$item);
                        session()->forget('cart.'.$item);
                        $this->msg ='Excluido com sucesso';
                    }


                break;

            default:
                # code...
                break;
        }
      return redirect('/')->with('status',$this->msg);
    }

    public function ajustarQuantidade($item, $operacao){
                    $produto  = session()->get('cart.'.$item);
                    $operacao ? $produto['qtd']-- : $produto['qtd']++;
                    session()->forget('cart'.$produto ['id']);
                    session()->put('cart.'.$produto ['id'],$produto);
    }
}
