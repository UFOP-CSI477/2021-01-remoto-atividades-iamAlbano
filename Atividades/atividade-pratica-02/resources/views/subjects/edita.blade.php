@extends('layouts.basic', ['active' => 2])

@section('content')

<form action="/subjects/update/{{$subject->id}}" method="post" >
@csrf
    <div class="container position-absolute top-50 start-50 translate-middle" >
        <div class="row">
            <div class="mb-3">
                <h2 class="text-center">Editar tipo de protocolo</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <div class="mb-3 input-group">
                    <input type="text" value="{{$subject->name}}" placeholder="{{$subject->name}}" 
                    class="form-control" id="nome" name="nome" required>
                </div>
            </div>
        </div>

        <div class="row">
            <label for="exampleFormControlInput1" class="form-label">Preço</label>
            <div class="mb-3 input-group">
                <span class="input-group-text">R$</span>
                <input type="number" value="{{$subject->price}}"
                placeholder="{{$subject->price}}" 
                class="form-control" step="0.01" min="0" id="preco" name="preco" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit">Salvar alterações</button> 
            </div>
        </div>
    </div>

    
</form>

@endsection