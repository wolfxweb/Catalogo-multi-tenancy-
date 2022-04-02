@extends('layouts.app')

@section('content')
    @component('components.container')
        @component('components.card', ['titulo' => 'Lista Tenants', 'classCard' => 'col-sm-12', 'color' => 'bg-danger
            text-white'])
            <div>

                <a href="{{ route('tenant.create') }}" class="btn btn-primary float-end ">Cadastro tenant</a>
            </div>
            <div>
                @component('components.tabela',['classDivTabela'=>'','classTabela'=>''])
                @slot('thead')
                    <th scope="col">Id</th>
                    <th scope="col">Sub Dominio</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                @endslot
                @slot('tbody')
                @foreach ($tenants as $tenant)
                <tr>
                    <th>{{ $tenant->id }}</th>
                    <td>{{ $tenant->sub_dominio }}</td>
                    <td>{{ $tenant->nome }}</td>
                    <td>{{ $tenant->status == '1' ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        <div class="btn-group float-end" role="group">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeletar{{ $tenant->id }}">Deletar</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalGenerica{{ $tenant->id }}">Alterar</button>
                        </div>
                        @include('pages._template-parts.modal-delatar',
                            ['id'=>$tenant->id,
                            'rota'=>'tenant.destroy',
                            'msgTitulo'=>'Deseja mesmo deletar este cliente?',
                            'msgInfo'=>'',
                            'vrId'=>'tenant'])

                        @php
                            $modalGenerica = 'modalGenerica' . $tenant->id;
                        @endphp
                        @component('components.modal', ['modalID' => $modalGenerica, 'modalTitulo' => 'Editar'])
                            @php $rota =route('tenant.update',['tenant'=>$tenant->id]); @endphp
                            @include(
                                'pages.tenant.template-parts.form-cadastro',
                                [
                                    'tenant' => $tenant,
                                    'bntTitulo' => 'Alterar',
                                    'rota' => $rota,
                                ]
                            )
                        @endcomponent
                    </td>
                </tr>
            @endforeach

               @endslot
               @slot('paginacao')
               {{ $tenants->links() }}
               @endslot

            @endcomponent


         @endcomponent
    @endcomponent
@endsection
