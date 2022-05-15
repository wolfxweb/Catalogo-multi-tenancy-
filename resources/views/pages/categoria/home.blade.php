@extends('layouts.app')

@section('content')
    @component('components.container')
        @component('components.card', [
            'titulo' => 'Lista Categorias',
            'classCard' => 'col-sm-12',
            'color' => 'bg-danger
            text-white',
            ])
            <div>
                <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal"
                    data-bs-target="#modalCadastrarCategorias">Cadastrar</button>
              @component('components.modal', ['modalID' => 'modalCadastrarCategorias', 'modalTitulo' => 'Cadastrar'])
                    <form action="{{route('categoria.store') }}" method="POST">
                        @csrf
                        @include('components.input', [
                            'name' => 'nome',
                            'tilulo' => 'Nome Categoria',
                            'type' => 'text',
                            'value' => '',
                        ])

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary float-end ">Alterar</button>
                    <form>
              @endcomponent
            </div>
            <div>
                @component('components.tabela', ['classDivTabela' => '', 'classTabela' => ''])
                    @slot('thead')
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tenant id</th>
                        <th scope="col"></th>
                    @endslot
                    @slot('tbody')
                        @foreach ($categorias as $categoria)
                            <tr>
                                <th>{{ $categoria->id }}</th>
                                <td>{{ $categoria->nome }}</td>
                                <td>{{ $categoria->tenant_id }}</td>
                                <td>
                                    <div class="btn-group float-end" role="group">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeletar{{ $categoria->id }}">Deletar</button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#modalAlterar{{ $categoria->id }}">Alterar</button>
                                    </div>
                                    @include(
                                        'pages._template-parts.modal-delatar',[
                                            'id' => $categoria->id,
                                            'rota' => 'categoria.destroy',
                                            'msgInfo' => '',
                                            'msgTitulo' => '',
                                            'vrId' => 'categorium'
                                        ]
                                    )
                              @component('components.modal', ['modalID' => 'modalAlterar'.$categoria->id, 'modalTitulo' => 'Alterar'])
                              <form action="{{ route('categoria.update',['categorium'=>$categoria->id]) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  @include('components.input', [
                                      'name' => 'nome',
                                      'tilulo' => 'Nome Categoria',
                                      'type' => 'text',
                                      'value' =>  $categoria->nome,
                                  ])
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-primary float-end ">Alterar</button>
                                  <form>
                                  @endcomponent
                                </td>
                            </tr>
                        @endforeach
                    @endslot
                    @slot('paginacao')
                        {{ $categorias->links() }}
                    @endslot
                @endcomponent
            </div>
        @endcomponent
    @endcomponent
 @endsection
