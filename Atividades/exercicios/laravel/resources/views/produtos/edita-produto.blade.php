@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Alterar Produto</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">


    <table class="table">
        <thead class="bg-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col" class="text-center">Unidade de medida</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <form action="{{ route('produtos.update', $produto->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    <tr>
                        <td><input type="text" name="id" class="form-control" value="{{$produto->id}}" readonly></td>
                        <td>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" maxlength="100"
                                value="{{$produto->nome}}" placeholder="{{$produto->nome}}" 
                                aria-label="{{$produto->nome}}" id="nome" name="nome" required>
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" maxlength="3"
                                value="{{$produto->um}}" placeholder="{{$produto->um}}" 
                                aria-label="{{$produto->um}}" id="um" name="um" required>
                            </div>
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <a href="{{route('produtos.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                    </form>
 
</div>


@endsection