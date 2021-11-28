@extends('layout.app')
@section('content')

@include('menu')
<hr>
<h1 class="title text-center">Pesquisa de produtos</h1>

<div class="screen shadow-lg bg-body rounded position-absolute top-50 start-50 translate-middle">
    
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Nome do produto</span>
    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>

</div>


@endsection