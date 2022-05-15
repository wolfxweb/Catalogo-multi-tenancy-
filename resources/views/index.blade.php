@extends('layouts.app')
@section('content')
<div class="container">

   @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
        <strong>  {{session('status')}}</strong>
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

   @endif

  @if (session()->has('cart'))
            @php
                $sessionProdutos  = session()->get('cart');
                $totalPedido = 0;
                $qtdPredido =0;
                foreach ($sessionProdutos  as $key => $value) {
                    $totalPedido += ( (float)$value['preco']*(float)$value['qtd']);
                    $qtdPredido +=$value['qtd'];
                }

            @endphp
  @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <nav class="navbar navbar-light bg-light ">
                    <div class="container-fluid">

                    @if (session()->has('cart'))
                        <button type="button" class="btn btn-primary position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-cart-plus"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$qtdPredido}}</span>
                        </button>
                    @endif
                        <!-- Modal Carrinho compra -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Carrinho de compra </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="modal-body ">

                                            <table class="table table-hover">
                                              <thead>
                                                  <tr>
                                                      <th>Nome</th>
                                                      <th>Qtd.</th>
                                                      <th>Valor</th>
                                                      <th>Total</th>
                                                      <th>Ações</th>
                                                  </tr>

                                              </thead>
                                              <tbody>
                                                  @isset($sessionProdutos )

                                                  @foreach ( $sessionProdutos as $sessionProduto )
                                                    <tr>

                                                        <th>{{$sessionProduto['nome']}}</th>
                                                        <th>{{$sessionProduto['qtd']}}</th>
                                                        <th>R$ {{ number_format( (float)$sessionProduto['preco'], 2) }}</th>
                                                        <th>R$ {{ number_format((float)$sessionProduto['preco']*(float)$sessionProduto['qtd'],2)}}</th>
                                                        <th>
                                                          <div class="btn-group btn-group-sm " role="group" aria-label="Basic mixed styles example">
                                                              <a href="{{ route('ajustCart',['itemId'=>$sessionProduto['id'],'acao'=>'E']) }}"  type="button" class="btn btn-danger "><i class="bi bi-cart-x"></i></a>
                                                              <a href="{{ route('ajustCart',['itemId'=>$sessionProduto['id'],'acao'=>'D']) }}"  type="button" class="btn btn-secondary "><i class="bi bi-cart-dash"></i></a>
                                                              <a href="{{ route('ajustCart',['itemId'=>$sessionProduto['id'],'acao'=>'A']) }}"  type="button" class="btn btn-success "><i class="bi bi-cart-plus"></i></a>
                                                          </div></th>
                                                    </tr>
                                                  @endforeach

                                                  @endisset

                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Valor Total</th>

                                                    @isset($totalPedido)
                                                        <th>R$ {{number_format($totalPedido,2)}}</th>
                                                    @endisset

                                                    @empty($totalPedido)
                                                         <th>R$ 0,00</th>
                                                    @endempty

                                                    <th class="d-grid gp-2 mx-auto">
                                                        <a   href="{{ route('checkoutCart') }}" type="button" class=" btn btn-primary btn-sm">Comprar</a>
                                                    </th>
                                                </tr>
                                              </tfoot>
                                              </table>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">Sair</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Carrinho compra -->
                        <form class="d-flex" action="{{ route('search')}}" method="POST">
                            @csrf
                            <input name="search" class="form-control me-2" type="" placeholder="Pesquisar produto"
                                aria-label="Search">
                            <button class="btn btn-success" type="submit">Localizar</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="row">

                @foreach ( $produtos as $produto )

                <div class="col-sm-4 p-2 ">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <img src="/public/image/{{$produto->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <p class="card-text">{{$produto->descricao}}</p>
                            @if ($produto->preco_promocinal)
                            <p>Promoção de <del class="text-danger">R$ {{$produto->preco}}</del> <strong> por R$
                                    {{$produto->preco_promocinal}}</strong></p>
                            @else
                            <p>Preço{{$produto->preco}}</p>
                            @endif
                            <div class="float-end">
                                @if($produto->status)
                                <span class="badge bg-success p-2 float-left">Disponível</span>
                                @else
                                <span class="badge bg-danger p-2 float-left">Indisponível</span>
                                @endif
                            </div>
                        </div>

                        @if($produto->status)

                        <form  action="{{ route('addCart')}}" method="POST">
                            @csrf
                            <input type="hidden"  name="produto[id]" value="{{$produto->id}}">
                            <input type="hidden"  name="produto[nome]" value="{{$produto->nome}}">
                            <input type="hidden"  name="produto[preco]" value="{{$produto->preco}}">
                            <input type="hidden"  name="produto[qtd]" value="1">
                            <button class="btn btn-primary " type="submit"><i class="bi bi-cart-check"></i></button>
                        </form>

                        @endif
                    </div>
                </div>
                @endforeach
                <div>
                    {{$produtos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
