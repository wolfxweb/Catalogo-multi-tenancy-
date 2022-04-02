
@component('components.modal', ['modalID' =>'modalDeletar'.$id, 'modalTitulo' => 'Excluir'])
    <form method="POST" action="{{!! route($rota ,[$vrId=>$id]) !!}}">
            @csrf
            @method('DELETE')
            <h5>{{$msgTitulo ? $msgTitulo:'Deseja mesmo deletar esta categoria?'}}</h5>
            <p>{{$msgInfo?msgInfo:'Esta ação e irreversível.' }} </p>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endcomponent
