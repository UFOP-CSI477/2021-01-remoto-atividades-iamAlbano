@extends('layouts.basic', ['active' => 2])

@section('content')

<div class="form-floating mb-2">
  <input type="text" class="form-control" id="floatingInput" onkeyup="pesquisa()" placeholder="pesquisar">
  <label for="floatingInput">Pesquisar</label>
</div>

<table class="table">
  <thead class="sticky-top ">
    <tr class="bg bg-light ">
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col" class="text-center" >Editar</th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>
  </thead>

  <tbody class="tabela">  
    
  </tbody>

</table>


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