@component('components.main', [
    'classCard' => 'col-sm-12',
    'color' => 'bg-danger text-white',
    'titulo' => 'Listar Produtos',
    ])
    <a href="{{ route('produto.create') }}" type="button" class="btn btn-primary float-end ">Cadastrar</a>
    <div>
        @component('components.tabela', ['classDivTabela' => '', 'classTabela' => ''])
            @slot('thead')
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Preço promocional</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            @endslot
            @slot('tbody')
              @isset($produtos)
                            @foreach ($produtos as $produto)
                            <tr>
                                <th>{{ $produto->id }}</th>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descrição }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->preco_promocinal }}</td>
                                <td>{{ $produto->status?"Ativo":"Inativo"}}</td>
                                <td>
                                    <div class="btn-group float-end" role="group">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDeletar{{$produto->id}}">Deletar</button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#modalAlterar{{$produto->id}}">Alterar</button>
                                    </div>
                                    @include(
                                        'pages._template-parts.modal-delatar',[
                                            'id' => $produto->id,
                                            'rota' => 'produto.destroy',
                                            'msgInfo' => '',
                                            'msgTitulo' => '',
                                            'vrId' => 'produto'
                                        ]
                                    )

                                </td>
                            </tr>
                        @endforeach
                    @endslot
                    @slot('paginacao')
                        {{ $produtos->links() }}
                    @endslot
              @endisset

        @endcomponent
    </div>
@endcomponent
