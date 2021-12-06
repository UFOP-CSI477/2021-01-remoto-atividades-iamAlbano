@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Cadastrar Cidade</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">
    <form action="{{route('cidades.store')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome da cidade</span>
            <input id="nome" name="nome" type="text" class="form-control" aria-describedby="basic-addon1" maxlength="100" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Estado</span>
            
            <select class="form-select" name="estados_id" id="estados_id" aria-label="Default select example">
            @foreach($estados as $estado)
            <option value="{{$estado->id}}">{{$estado->sigla}}</option>
            @endforeach
            </select>
        </div>

        <div class="text-center">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </form>

</div>


@endsection