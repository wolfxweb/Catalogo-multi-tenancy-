@php
$inputsText = [
    'nome' => [
        'name' => 'nome',
        'tilulo' => 'Nome Produto',
        'type' => 'text',
        'value' => '',
    ],
    'descrição' => [
        'name' => 'descricao',
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
         'rota' => 'produto.store',
         'id'=>null,
         'categoriaSelecionada'=> null,
         'checked'=>true,
         'bntTitulo' => 'Cadastrar',
         'inputsText' =>$inputsText,
         'categorias'=>$categorias])
    @endcomponent
@endcomponent

