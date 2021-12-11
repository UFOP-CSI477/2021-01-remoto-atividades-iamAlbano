@extends('layouts.basic')

@section('content')


@include('menu')
<div class="bg bg-light position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded">
    
    <form action="{{route('tipos.store')}}" method="POST">
        @csrf  
        <p class="text-center">Novo tipo de protocolo</p>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="" aria-label="Nome" aria-describedby="Nome" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Preço</span>
            <input type="number" class="form-control" 
            id="preco" name="preco" placeholder=""
            min="0" step="0.01" 
            aria-label="Preco" aria-describedby="Preco" required>
        </div>

        <div class="text-center">     
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>


</div>
@endsection