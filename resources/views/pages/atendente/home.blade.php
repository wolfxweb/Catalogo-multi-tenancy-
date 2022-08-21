

@extends('layouts.app')
<!--
    informações do antedente
        * nome -> selecionar da tabela de usuarios  criar mais um nivel no caso atendente
        * endereço completo 
        * telefone
        * whatsapp
        * ativar receber mas zapp
        * horario de trabalho e dias da semana
        * status
        {
            "id":1,
            "id_user":1,
            "tenant_id":1,
            "telefone":"48-984132339"
            "celular":"48-984192339"
            "status":1,
            "endereco":{
                "rua":"rua",
                "numero":"numero",
                "ponto_referencia":"ponto_referencia",
                "bairro":"bairro",
                "cidade":"cidade",
                "estado":"estado",
                "cep":"cep"
            }
            "cpf":"cpf",
            "rg":"rg",
            "chave_pix":"chave_pix"
            
}

-->
@section('content')
    @component('components.container')
     <h1>Atendentes</h1>
    @endcomponent
 @endsection
