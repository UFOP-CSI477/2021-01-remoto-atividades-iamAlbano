@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Pesquisa de cidades</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </span>
    <form action="/procura-cidade" method="GET">
    @csrf
        <input type="text" class="form-control" name="nome" id="nome"
        placeholder="Pesquisar por nome" aria-label="Pesquisar por nome" aria-describedby="basic-addon1">

        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>  
            
            Pesquisar</button>
        </div>

    </form>
</div>


@endsection