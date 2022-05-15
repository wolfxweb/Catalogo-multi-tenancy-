@extends('layouts.app')
@section('content')

    <div class="container">
        @if (session()->has('cart'))
            @php
                $sessionProdutos = session()->get('cart');
                $totalPedido = 0;
                foreach ($sessionProdutos as $key => $value) {
                    $totalPedido += (float)$value['preco'] * (float)$value['qtd'];
                }
            @endphp
        @endif

        @isset($sessionProdutos)

        @auth()
            <form action="{{ route('pedido.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="valor_pedido" name="valor_pedido" value="{{$totalPedido??''}}">
                <button type="submit" class="btn btn-primary">Finalizar a compra</button>
            </form>
        @endauth

        @unless (Auth::check())
           <P> Faça login no sistema para finalizar o pedido.</P>
        @endunless



            @component('components.tabela', ['classDivTabela' => '', 'classTabela' => ''])
                @slot('thead')
                    <th>Nome</th>
                    <th>Qtd.</th>
                    <th>Valor</th>
                    <th>Total</th>
                @endslot
                @slot('tbody')
                        @foreach ($sessionProdutos as $sessionProduto)
                            <tr>
                                <th>{{ $sessionProduto['nome'] }}</th>
                                <th>{{ $sessionProduto['qtd'] }}</th>
                                <th>R$ {{ number_format((float)$sessionProduto['preco'], 2) }}</th>
                                <th>R$ {{ number_format((float)$sessionProduto['preco'] * (float)$sessionProduto['qtd'], 2) }}</th>
                            </tr>
                        @endforeach
                @endslot
                @slot('tfoot')
                    @isset($totalPedido)
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Valor Total:</th>
                                <th>R$ {{ number_format((float)$totalPedido, 2) }}</th>
                            </tr>
                        </tfoot>
                   @endisset
                @endslot
            @endcomponent
        @endisset
    </div>


@endsection
