@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Alterar Cidade</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">


    <table class="table">
        <thead class="bg-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <form action="{{ route('cidades.update', $cidade->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    <tr>
                        <td>
                        <div class="input-group mb-2">    
                        <input type="text" name="id" class="form-control" value="{{$cidade->id}}" readonly>
                        </div>
                    </td>
                        <td>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" maxlength="100"
                                value="{{$cidade->nome}}" placeholder="{{$cidade->nome}}" 
                                aria-label="{{$cidade->nome}}" id="nome" name="nome" required>
                            </div>
                        </td>

                        <td>
                            <div class="input-group mb-4">
                            <select class="form-select" name="estados_id" id="estados_id" aria-label="Default select example">
                                @foreach($estados as $estado)
                                <option value="{{$estado->id}}"
                                @if($cidade->estado_id == $estado->id)
                                    selected
                                @endif
                                >{{$estado->sigla}}</option>
                                @endforeach
                            </select>
                            </div>
                        </td>        
                        
                    </tr>
                    
                </tbody>
            </table>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        <a href="{{route('cidades.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                    </form>
 
</div>


@endsection