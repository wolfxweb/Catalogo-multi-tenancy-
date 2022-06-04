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
                @endslot
                @slot('tbody')
                    @foreach ($clientes as $cliente)
                    
                        <tr>
                            <th scope="col">{{ $cliente->id}}</th>
                            <th scope="col">{{ $cliente->name }}</th>
                            <th scope="col">{{ $cliente->email }}</th>
                        <tr>
                    @endforeach
                @endslot
                @slot('paginacao')
                @endslot
            @endcomponent
        @endcomponent
    @endcomponent
@endsection
