@extends('layouts.basic')

@section('content')


      
    <div class="bg bg-light position-absolute top-50 start-50 translate-middle border border-5 conteudo conteudo-lg overflow-scroll">
      
      <div class="form-floating mb-2 row p-3 text-center">
        <div class="col">
              <h3>Pessoas</h3>
          </div>
          
        <div class="col">   
            <input type="text" class="form-control" id="pessoaSearch" onkeyup="pesquisa()" placeholder="pesquisar">
        </div>

        <div class="col">
            <button type="button" data-bs-toggle="modal" data-bs-target="#nova" 
            class="btn btn-success">
            <svg class="me-2 align-middle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            Nova pessoa</button>
        </div>
      </div>
    


    <table class="table">
        <thead class="sticky-top ">
            <tr class="bg bg-light ">
            <th scope="col" class="text-center">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col" class="text-center" >Editar</th>
            <th scope="col" class="text-center">Excluir</th>
            </tr>
        </thead>

        <tbody class="tabela">  

        </tbody>

    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="nova" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cadastrar nova pessoa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="{{ route('pessoas.store')}}" method="post">
        @csrf
        <div class="container">
        
        <div class="row">
            <div class="col input-group mb-3">
              <span class="input-group-text">Nome</span>
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
        </div>

        <div class="row">
            <div class="col input-group mb-3">
              <span class="input-group-text">CPF</span>
              <input type="text" class="form-control" id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
            </div>

            <div class="col input-group mb-3">
              <span class="input-group-text">Data de nascimento</span>
              <input type="date" class="form-control" id="data" name="data" required>
            </div>
        </div>
          
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>

     </form>
    </div>

  </div>
</div>

@foreach($pessoas as $pessoa)
<!-- Modal -->
<div class="modal fade" id="edit-{{$pessoa->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar pessoa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="{{ route('pessoas.update', $pessoa->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
        
        <div class="row">
            <div class="col input-group mb-3">
              <span class="input-group-text">Nome</span>
              <input type="text" class="form-control" id="nome" name="nome" value="{{$pessoa->nome}}" placeholder="{{$pessoa->nome}}" required>
            </div>
        </div>

        <div class="row">
            <div class="col input-group mb-3">
              <span class="input-group-text">CPF</span>
              <input type="text" class="form-control" id="cpf" name="cpf" value="{{$pessoa->cpf}}" 
              placeholder="{{$pessoa->cpf}}" onkeypress="$(this).mask('000.000.000-00');" required>
            </div>

            <div class="col input-group mb-3">
              <span class="input-group-text">Data de nascimento</span>
              <input type="date" class="form-control" id="data" name="data" value="{{$pessoa->data_nascimento}}"required>
            </div>
        </div>
          
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Alterar</button>
      </div>

     </form>
    </div>

  </div>
</div>

@endforeach






@foreach($pessoas as $pessoa)
<!-- Modal -->
<div class="modal fade" id="delete-{{$pessoa->id}}" aria-labelledby="exampleModalLabel" tabindex="-1"  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir pessoa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir {{$pessoa->nome}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('pessoas.destroy', $pessoa->id )}}" method="post">
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
    var search = $('#pessoaSearch').val();
    
    var data = {
      word: search,
    }
    $.get("{!! url('pessoasTable')!!}", data, function(table){
          $(".tabela").html(table)
      });
  }

  $( document ).ready(function() {
    pesquisa();
});
</script>
@endsection