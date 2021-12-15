@extends('layouts.basic', ['active' => 2])

@section('content')


      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="floatingInput" onkeyup="pesquisa()" placeholder="pesquisar">
        <label for="floatingInput">Pesquisar</label>
      </div>
    


<table class="table">
  <thead class="sticky-top ">
    <tr class="bg bg-light ">
      <th scope="col" class="text-center">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col" class="text-center" >Editar</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>

  <tbody class="tabela">  

  </tbody>

</table>




@foreach($subjects as $subject)
<!-- Modal -->
<div class="modal fade" id="delete-{{$subject->id}}" aria-labelledby="exampleModalLabel" tabindex="-1"  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir tipo de protocolo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir o tipo de protocolo {{$subject->name}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/subjects/destroy/{{$subject->id}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal impossível excluir-->
<div class="modal fade" id="no-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Impossível excluir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Não é possível excluir pois existem protocolos associados a este tipo
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>


@endforeach


<script>
  
  function pesquisa(){

    var search = $('#floatingInput').val();
    
    var data = {
      word: search,
    }

    $.get("{!! url('subjectsTable')!!}", data, function(table){
          $(".tabela").html(table)
      });
  }

  $( document ).ready(function() {
    pesquisa();
});

</script>
@endsection