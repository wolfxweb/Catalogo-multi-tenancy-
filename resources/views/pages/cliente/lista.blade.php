@extends('layouts.app')

@section('content')
    @component('components.container')
        @component('components.card',
            [
                'titulo' => 'Lista Clientes',
                'classCard' => 'col-sm-12',
                'color' => 'bg-primary
                         text-white',
            ])
            @component('components.tabela', ['classDivTabela' => '', 'classTabela' => ''])
                @slot('thead')
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Ações</th>
                @endslot
                @slot('tbody')
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="col">{{ $cliente->id}}</th>
                            <th scope="col">{{ $cliente->name }}</th>
                            <th scope="col">{{ $cliente->email }}</th>
                            <th scope="col">{{ $cliente->nivel_acesso }}</th>
                            <th scope="col">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i></button>
                                </div>
                            </th>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edição usuário</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Salvar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <tr>            
                    @endforeach
                @endslot
                @slot('paginacao')
                @endslot
            @endcomponent
        @endcomponent
    @endcomponent
@endsection
