@php
$inputsText = [
    'nome' => [
        'name' => 'nome',
        'tilulo' => 'Nome ',
        'type' => 'text',
        'value' => 'sss',
    ],
    'descrição' => [
        'name' => 'descrição',
        'tilulo' => 'Descrição ',
        'type' => 'text',
        'value' => '',
    ],
    'preco' => [
        'name' => 'preco',
        'tilulo' => 'Preco ',
        'type' => 'text',
        'value' => '',
    ],
    'preco_promocinal' => [
        'name' => 'preco_promocinal',
        'tilulo' => 'Preco promocional ',
        'type' => 'text',
        'value' => '',
    ],
    'peso' => [
        'name' => 'peso',
        'tilulo' => 'Peso',
        'type' => 'text',
        'value' => '',
    ],
    'largura' => [
        'name' => 'largura',
        'tilulo' => 'Largura',
        'type' => 'text',
        'value' => '',
    ],
    'altura' => [
        'name' => 'altura',
        'tilulo' => 'Altura',
        'type' => 'text',
        'value' => '',
    ],
    'profundidade' => [
        'name' => 'profundidade',
        'tilulo' => 'Profundidade',
        'type' => 'text',
        'value' => '',
    ],
];
@endphp




@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-danger
    text-white',
    'titulo' => 'Cadastro Produto',
    ])
    @component('pages.produto.template-parts.form-produto',
     [
         'rota' => '#',
     'bntTitulo' => 'Cadastrar',
     'inputsText' =>$inputsText,
     'categorias'=>$categorias])
    @endcomponent
@endcomponent
<!--
    nome input text
    descrição input text
    preco input text
    preco_promocinal input text
    peso input text
    largura input text
    altura input text
    profundidade input text

     categoria  select box


    img  input img
    status input radio

--->
