
@php
    use App\Util\ConfigInputs\ProdutoInputs as ProdutoInput;
    $inputsText = ProdutoInput::config(null);
@endphp

@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-primary
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

