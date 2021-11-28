@extends('layout.app')
@section('content')
<hr>
<h1 class="title text-center">Produtos</h1>

<div class="shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">

<form class="input-group" action="/produtos/1">
    @csrf
  <input type="text" class="form-control " placeholder="Pesquisar produto" aria-label="Pesquisar produto" aria-describedby="button-addon2" id="produto" name="produto">
  <button class="btn btn-primary" type="submit" id="button-addon2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
  </button>
</form>
<hr>
    <div class="tabela overflow-scroll">
        <table class="table table-hover">
                <thead class="bg-light sticky-top">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="text-center">Unidade de medida</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td class="text-center">{{$produto->um}}</td>
                            
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>
    </div>


</div>



@endsection