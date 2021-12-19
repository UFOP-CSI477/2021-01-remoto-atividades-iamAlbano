@extends('layouts.basic', ['active' => 3])

@section('content')


      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="requestSearch" onkeyup="pesquisa()" placeholder="pesquisar">
        <label for="requestSearch">Pesquisar por pessoa responsável</label>
      </div>
    


<table class="table">
  <thead class="sticky-top ">
    <tr class="bg bg-light ">
      <th scope="col" class="text-center">id</th>
      <th scope="col">Tipo</th>
      <th scope="col">Pessoa</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data</th>
      <th scope="col" class="text-center" >Editar</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>

  <tbody class="tabela">  

  </tbody>

</table>

@foreach($requests as $request)
<!-- Modal -->
<div class="modal fade" id="delete-{{$request->id}}" aria-labelledby="exampleModalLabel" tabindex="-1"  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir protocolo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir o protocolo {{$request->id}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/requests/destroy/{{$request->id}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach


<script>
  
  function pesquisa(){

    var search = $('#requestSearch').val();
    
    var data = {
      word: search,
    }

    $.get("{!! url('requestsTable')!!}", data, function(table){
          $(".tabela").html(table)
      });
  }

  $( document ).ready(function() {
    pesquisa();
});

</script>
@endsection