@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Cidade</h1>

<div class="shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">


    <table class="table table-hover">
        <thead class="bg-light sticky-top">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col" >Estado</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    <tr>
                        <td>{{$cidade->id}}</td>
                        <td>{{$cidade->nome}}</td>
                        <td>{{$cidade->estado->nome}} - {{$cidade->estado->sigla}}</td>
                        
                    </tr>
                    
                    
                </tbody>
            </table>
    <div class="text-center">
        <a href="/pesquisa-cidade" class="link-primary">Voltar</a>
    </div>
    
    <hr>
</div>


@endsection