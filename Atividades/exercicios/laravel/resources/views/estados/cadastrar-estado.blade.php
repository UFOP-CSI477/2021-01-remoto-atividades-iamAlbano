@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Cadastrar Estado</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">
    <form action="{{route('estados.store')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do estado</span>
            <input id="nome" name="nome" type="text" class="form-control" aria-describedby="basic-addon1" maxlength="100" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Sigla</span>
            <input id="sigla" name="sigla" type="text" class="form-control" aria-describedby="basic-addon1" maxlength="2" required>
        </div>

        <div class="text-center">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </form>

</div>


@endsection