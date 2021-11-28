@extends('layout.app')
@section('content')
<hr>
<h1 class="title text-center">Produtos</h1>

<div class="shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">


    <table class="table table-hover">
        <thead class="bg-light sticky-top">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col" class="text-center">Unidade de medida</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td class="text-center">{{$produto->um}}</td>
                        
                    </tr>
                    
                    
                </tbody>
            </table>
    <div class="text-center">
        <a href="/produtos/todos" class="link-primary">Voltar</a>
    </div>
    
    <hr>
</div>


@endsection