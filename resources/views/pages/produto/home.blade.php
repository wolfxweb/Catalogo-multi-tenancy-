@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-danger text-white',
    'titulo' => 'Listar Produtos',
    ])
    <a href="{{ route('produto.create') }}" type="button" class="btn btn-primary float-end ">Cadastrar</a>
@endcomponent
