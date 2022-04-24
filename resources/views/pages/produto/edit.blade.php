

{{$produto}}
@php
$inputsText = [
    'nome' => [
        'name' => 'nome',
        'tilulo' => 'Nome Produto',
        'type' => 'text',
        'value' => $produto->nome,
    ],
    'descrição' => [
        'name' => 'descricao',
        'tilulo' => 'Descrição ',
        'type' => 'text',
        'value' => $produto->descricao,
    ],
    'preco' => [
        'name' => 'preco',
        'tilulo' => 'Preco ',
        'type' => 'text',
        'value' =>$produto->preco,
    ],
    'preco_promocinal' => [
        'name' => 'preco_promocinal',
        'tilulo' => 'Preco promocional ',
        'type' => 'text',
        'value' =>$produto->preco_promocinal,
    ],
    'peso' => [
        'name' => 'peso',
        'tilulo' => 'Peso',
        'type' => 'text',
        'value' => $produto->peso,
    ],
    'largura' => [
        'name' => 'largura',
        'tilulo' => 'Largura',
        'type' => 'text',
        'value' =>$produto->largura,
    ],
    'altura' => [
        'name' => 'altura',
        'tilulo' => 'Altura',
        'type' => 'text',
        'value' =>$produto->altura,
    ],
    'profundidade' => [
        'name' => 'profundidade',
        'tilulo' => 'Profundidade',
        'type' => 'text',
        'value' => $produto->profundidade,
    ],
];
@endphp


@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-danger
    text-white',
    'titulo' => 'Edição Produto',
    ])
    @component('pages.produto.template-parts.form-produto',
     [
         'rota' => 'produto.update',
         'id'=>$produto->id,
         'categoriaSelecionada'=> $produto->categoria_id,
         'checked'=> $produto->status,
         'bntTitulo' => 'Atualizar',
         'inputsText' =>$inputsText,
         'categorias'=>$categorias])
    @endcomponent
    <hr>
    <figure class="figure">
        <figcaption class="figure-capiton mb-3"> Imagem cadastrada </figcaption>
        <img src="/public/image/{{$produto->img}}" class="figure-img img-fluid " >
    </figure>
@endcomponent


