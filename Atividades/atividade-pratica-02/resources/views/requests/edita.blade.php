@extends('layouts.basic', ['active' => 3])

@section('content')

<form action="/requests/update/{{$request->id}}" method="post" >
@csrf

    <div class="container position-absolute top-50 start-50 translate-middle">
      

        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Id</label>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">#</span>
                <input type="text" class="form-control" 
                placeholder="{{$request->id}}" value="{{$request->id}}" readonly>
                </div>
            </div>

            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Pessoa responsável</label>
                <input type="text" id="pessoa" name="pessoa" 
                value="{{$request->person}}" placeholder="{{$request->person}}"
                class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Data de registro</label>
                <input type="date" id="data" name="data" 
                value="<?php echo date('Y-m-d', strtotime($request->date)) ?>"
                class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Tipo de protocolo</label>   
                    <select class="form-select" name="subject" id="subject">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}"
                        @if($subject->id == $request->subject_id)
                        selected
                        @endif
                        >{{$subject->name}}</option>
                    @endforeach      
                    </select>     
            </div>
        </div>

        <div class="row mb-2">
        <label for="exampleFormControlInput1" class="form-label">Descrição</label> 
            <div class="input-group mb-2">
                <textarea class="form-control" 
                name="descricao" id="descricao" aria-label="With textarea" 
                required>{{$request->description}}</textarea>
            </div>
        </div>

        


        <div class="row mb-3">
            <div class="text-center">
                <button class="btn btn-success" type="submit">Alterar</button> 
            </div>
        </div>


        
    </div>

    
</form>

@endsection