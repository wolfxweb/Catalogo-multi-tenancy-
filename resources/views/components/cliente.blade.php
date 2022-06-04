<div class="card-header bg-primary text-white">{{ __($titulo) }}</div>

<div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                
                @include('components.alert')

                <nav class="navbar navbar-light bg-light shadow-sm p-3 mb-3 bg-body rounded">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <form class="d-flex" action="{{route('pedido.localizarPedido') }} " method="POST">
                            @csrf
                            <ul class="nav justify-content-end">
                                <li class="nav-item m-1">
                                    <input type="date" name="data" class="form-control" >
                                </li>
                                <li class="nav-item m-1">
                                    <select class="form-select" aria-label="Default select example" name="selLocalizar" >
                                        <option value=""selected>Selecione o tipo do filtro</option>
                                        <option value="1">Numero pedido</option>
                                        <option value="2">Status aberto</option>
                                        <option value="3">Status fechado</option>
                                        <option value="4">Produto</option>
                                        <option value="5">Data</option>
                                    </select>
                                </li>
                                <li class="nav-item m-1">
                                    <div class="input-group float-end ">
                                        <input type="text" name="txtLocalizar" class="form-control" placeholder="Digite o número do pedido" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                                        <a class="btn btn-outline-secondary" href="{{route('home') }}"><i class="bi bi-arrow-clockwise"></i></a>
                                    </div>
                                </li>

                            </ul>
                        </form>
                    </div>
                </nav>
                @foreach($pedidos as $key => $pedido)
                <div class="accordion accordion-flush " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item  ">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne{{ $key }}">
                            <button class="accordion-button  bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne{{ $key }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne{{ $key }}">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-3">
                                            Número Pedido: {{$pedido->id }}
                                        </div>
                                        <div class="col-3">

                                        </div>
                                        <div class="col-6 float-end">

                                            <div>
                                                <span class="badge rounded-pill {{ $pedido->status =="Aberto"?"bg-primary text-white":"bg-success text-white" }}"> {{ $pedido->status  }} </span>
                                                Data compra {{ date( 'd/m/Y' , strtotime($pedido->created_at))}}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne{{ $key }}" class="accordion-collapse collapse  " aria-labelledby="panelsStayOpen-headingOne{{ $key }}">
                            <div class="accordion-body">
                                <div> Detalhes do Pedido </div>

                                @php
                                $pedidoItems = json_decode($pedido->items);
                                @endphp
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cód </th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Valor Unt.</th>
                                            <th scope="col">Valor total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pedidoItems as $key => $pedidoItem)
                                        <tr>
                                            <th> {{ $pedidoItem->id }}</th>
                                            <td> {{ $pedidoItem->nome }}</td>
                                            <td> {{ $pedidoItem->qtd }}</td>
                                            <td> {{ $pedidoItem->preco }}</td>
                                            <td> {{ number_format(floatval($pedidoItem->preco )*floatval($pedidoItem->qtd),2,',','.')}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Total</th>
                                            <th> {{ number_format($pedido->total_pedido,2,',','.')}}</th>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-3">
                        {{ $pedidos->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script>

</script>
