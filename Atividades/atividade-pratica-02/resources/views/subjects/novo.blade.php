@extends('layouts.basic', ['active' => 2])

@section('content')

<form action="/subjects" method="post" >
  
@csrf
    <div class="container position-absolute top-50 start-50 translate-middle" >
        <div class="row">
            <div class="mb-3">
                <h2 class="text-center">Cadastrar novo</h2>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="nome" name="nome" required>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Preço</label>
                <input type="number" class="form-control" step="0.01" min="0" id="preco" name="preco" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit">Cadastrar</button> 
            </div>
        </div>
    </div>

    
</form>

@endsection