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

        if (session()->has('cart.' . $produto['id'])) {

            $produto  = session()->get('cart.' . $produto['id']);

            $produto['qtd']++;

            session()->forget('cart' . $produto['id']);

            session()->put('cart.' . $produto['id'], $produto);
        } else {

            session()->put('cart.' . $produto['id'], $produto);
        }
        return redirect('/')->with('status', 'Produto adicioando com sucesso');
    }

    public function ajustCart($item, $acao)
    {



        $msg = 'Produto adicioando com sucesso';

        switch ($acao) {

            case 'E':
                $this->excluirItem($item);
                //    session()->forget('cart.' . $item);
                //    $this->msg = 'Excluido com sucesso';

                break;

            case 'A':

                    $produto  = session()->get('cart.' . $item);
                    $produto['qtd']++;
                    $this->quantidadeCart($item , $produto);
                    /*
                        session()->forget('cart' . $produto['id']);
                        session()->put('cart.' . $produto['id'], $produto);
                        $this->msg = 'Produto atualizado com sucesso';
                    */

                break;

            case 'D':


                $produto  = session()->get('cart.' . $item);

                if ($produto['qtd'] > 1) {
                    $produto['qtd']--;
                    $this->quantidadeCart($item , $produto);
                    /*
                        session()->forget('cart' . $produto['id']);
                        session()->put('cart.' . $produto['id'], $produto);
                        $this->msg = 'Produto diminuido com sucesso';
                    */
                } else {

                    $this->excluirItem($item);
                //  session()->forget('cart.' . $item);
                //  $this->msg = 'Excluido com sucesso';

                }

                break;

            default:
                # code...
                break;
        }
        return redirect('/')->with('status', $this->msg);
    }

    private function quantidadeCart($item , $produto){
        session()->forget('cart' . $item);
        session()->put('cart.' . $item, $produto);
        $this->msg = 'Produto atualizado com sucesso';
    }

    private function excluirItem($item){
        session()->forget('cart.' . $item);
        $this->msg = 'Excluido com sucesso';
    }
    
    public  function checkoutCart(){
        return view('pages.checkout.checkout');
      //  dd("criar página de checout");
    }



}

