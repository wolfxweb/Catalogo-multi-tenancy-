
@php
    use App\Util\ConfigInputs\ProdutoInputs as ProdutoInput;
    $inputsText = ProdutoInput::config($produto);
@endphp


@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-primary
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


