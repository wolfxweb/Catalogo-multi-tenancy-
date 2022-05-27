
<div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-9">
        <div class="accordion" id="accordionPanelsStayOpenExample">
          @foreach($pedidos as $key => $pedido)
          <div class="accordion-item  ">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne{{ $key }}">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne{{ $key }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne{{ $key }}">
                <div class="container ">
                  <div class="row">
                    <div class="col-3">
                     Número Pedido: {{$pedido->id }} 
                    </div>
                    <div class="col-3">
                      
                    </div>
                    <div class="col-6 float-end">
                   
                      <div> 
                        <span class="badge rounded-pill {{ $pedido->status =="Aberto"?"bg-primary text-white":"bg-success text-white" }}">  {{ $pedido->status  }} </span>
                        Data compra  {{ date( 'd/m/Y' , strtotime($pedido->created_at))}} 
                      </div>
                      
                    </div>
                  </div>
                </div>
              
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne{{ $key }}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne{{ $key }}">
              <div class="accordion-body">
                <div>  Data compra  {{ date( 'd/m/Y' , strtotime($pedido->created_at))}} </div>
                {{ $pedido->status  }} 
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
        </div>
      </div>
      <div class="col-sm-12 col-md-3">
        Uma de três colunas
      </div>
    </div>
  </div>