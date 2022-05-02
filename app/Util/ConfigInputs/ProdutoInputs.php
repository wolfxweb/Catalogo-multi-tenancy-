<?php
namespace App\Util\ConfigInputs;

class ProdutoInputs{
    public static function config($produto = null){
        return[
                'nome' => [
                    'name' => 'nome',
                    'tilulo' => 'Nome Produto',
                    'type' => 'text',
                    'value' => $produto !="" ? $produto->nome:'',
                ],
                'descrição' => [
                    'name' => 'descricao',
                    'tilulo' => 'Descrição ',
                    'type' => 'text',
                    'value' => $produto !="" ? $produto->descricao:'',
                ],
                'preco' => [
                    'name' => 'preco',
                    'tilulo' => 'Preco ',
                    'type' => 'text',
                    'value' => $produto !="" ? $produto->preco:'',
                ],
                'preco_promocinal' => [
                    'name' => 'preco_promocinal',
                    'tilulo' => 'Preco promocional ',
                    'type' => 'text',
                    'value' => $produto !=""  ? $produto->preco_promocinal:'',
                ],
                'peso' => [
                    'name' => 'peso',
                    'tilulo' => 'Peso',
                    'type' => 'text',
                    'value' => $produto !="" ?  $produto->peso:'',
                ],
                'largura' => [
                    'name' => 'largura',
                    'tilulo' => 'Largura',
                    'type' => 'text',
                    'value' => $produto  !=""  ? $produto->largura:'',
                ],
                'altura' => [
                    'name' => 'altura',
                    'tilulo' => 'Altura',
                    'type' => 'text',
                    'value' => $produto !="" ? $produto->altura:'',
                ],
                'profundidade' => [
                    'name' => 'profundidade',
                    'tilulo' => 'Profundidade',
                    'type' => 'text',
                    'value' => $produto !="" ?$produto->profundidade:'',
                ],

        ];
    }
}
