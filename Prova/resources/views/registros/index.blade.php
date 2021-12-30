@extends('layouts.basic')

@section('content')


      
    <div class="bg bg-light position-absolute top-50 start-50 translate-middle border border-5 conteudo conteudo-lg overflow-scroll">
      
      <div class="form-floating mb-2 row p-3 text-center">
        <div class="col">
              <h3>Registros</h3>
          </div>
          
        <div class="col">   
            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Pessoa</label>
            <select class="form-select" id="pessoaSearch" onchange="pesquisa()">
                <option value="Todos" selected>Todos</option>
                @foreach($pessoas as $pessoa)
                    <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="col">   
            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Unidade</label>
            <select class="form-select" id="unidadeSearch" onchange="pesquisa()">
                <option value="Todos" selected>Todas</option>
                @foreach($unidades as $unidade)
                    <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="col">   
            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Vacina</label>
            <select class="form-select" id="vacinaSearch" onchange="pesquisa()">
                <option value="Todos" selected>Todas</option>
                @foreach($vacinas as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->nome}}</option>
                @endforeach
            </select>
            </div>
        </div>

        

        <div class="col">
            <button type="button" data-bs-toggle="modal" data-bs-target="#nova" 
            class="btn btn-success">
            <svg class="me-2 align-middle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            Novo registro</button>
        </div>
      </div>
    


    <table class="table">
        <thead class="sticky-top ">
            <tr class="bg bg-light ">
            <th scope="col" class="text-center">id</th>
            <th scope="col">Pessoa</th>
            <th scope="col">Unidade</th>
            <th scope="col">Vacina</th>
            <th scope="col">Data</th>
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
        <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="{{ route('registros.store')}}" method="post">
        @csrf
        <div class="container">
        
        <div class="row">
            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Pessoa </label>
                <select class="form-select" id="pessoa" name="pessoa">
                    @foreach($pessoas as $pessoa)
                    <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Vacina</label>
                <select class="form-select" id="vacina" name="vacina">
                    @foreach($vacinas as $vacina)
                    <option value="{{$vacina->id}}">{{$vacina->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Unidade</label>
                <select class="form-select" id="unidade" name="unidade">
                    @foreach($unidades as $unidade)
                    <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col input-group mb-3">
              <span class="input-group-text">Data</span>
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

@foreach($registros as $registro)
<!-- Modal -->
<div class="modal fade" id="edit-{{$registro->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="{{ route('registros.update', $registro->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
        
        <div class="row">
            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Pessoa </label>
                <select class="form-select" id="pessoa" name="pessoa">
                    @foreach($pessoas as $pessoa)
                    <option value="{{$pessoa->id}}"
                    @if($registro->pessoa_id == $pessoa->id) selected @endif
                    >{{$pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Vacina</label>
                <select class="form-select" id="vacina" name="vacina">
                    @foreach($vacinas as $vacina)
                    <option value="{{$vacina->id}}"
                    @if($registro->vacina_id == $vacina->id) selected @endif
                    >{{$vacina->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Unidade</label>
                <select class="form-select" id="unidade" name="unidade">
                    @foreach($unidades as $unidade)
                    <option value="{{$unidade->id}}"
                    @if($registro->unidade_id == $unidade->id) selected @endif
                    >{{$unidade->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col input-group mb-3">
              <span class="input-group-text">Data</span>
              <input type="date" value="{{$registro->data}}" class="form-control" id="data" name="data" required>
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






@foreach($registros as $registro)
<!-- Modal -->
<div class="modal fade" id="delete-{{$registro->id}}" aria-labelledby="exampleModalLabel" tabindex="-1"  aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir {{$registro->nome}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('registros.destroy', $registro->id )}}" method="post">
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
    var pessoa = $('#pessoaSearch option:selected').val();
    var unidade = $('#unidadeSearch option:selected').val();
    var vacina = $('#vacinaSearch option:selected').val();

    var data = {
      pessoa: pessoa,
      unidade: unidade,
      vacina: vacina,
    }
    $.get("{!! url('registrosTable')!!}", data, function(table){
          $(".tabela").html(table)
      });
  }

  $( document ).ready(function() {
    pesquisa();
});
</script>
@endsection