@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <nav class="navbar navbar-light bg-light ">
                    <div class="container-fluid">
                      <a class="navbar-brand"></a>
                      <form class="d-flex" action="{{ route('search')}}" method="POST">
                        @csrf
                        <input name ="search" class="form-control me-2" type="" placeholder="Pesquisar produto" aria-label="Search">
                        <button class="btn btn-success" type="submit">Localizar</button>
                      </form>
                    </div>
                  </nav>
            </div>
            <div class="row">

                @foreach ( $produtos as $produto )

                    <div class="col-sm-4 p-2 ">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                            <img  src="/public/image/{{$produto->img}}"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$produto->nome}}</h5>
                                <p class="card-text">{{$produto->descricao}}</p>
                                @if ($produto->preco_promocinal)
                                <p>Promoção de <del class="text-danger">R$ {{$produto->preco}}</del> <strong> por R$ {{$produto->preco_promocinal}}</strong></p>
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
                                 <a href="#" class="btn btn-primary m-2">Comprar</a>
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
