@extends('layouts.basic', ['active' => 3])

@section('content')

<form action="/requests" method="post" >
@csrf


    <div class="container position-absolute top-50 start-50 translate-middle">
      

        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Pessoa responsável</label>
                <input type="text" id="pessoa" name="pessoa" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Data de registro</label>
                <input type="date" id="data" name="data" 
                value="<?php echo date('Y-m-d'); ?>"
                class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Tipo de protocolo</label>   
                    <select class="form-select" name="subject" id="subject">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach      
                    </select>     
            </div>
        </div>

        <div class="row mb-2">
        <label for="exampleFormControlInput1" class="form-label">Descrição</label> 
            <div class="input-group mb-2">
                <textarea class="form-control" name="descricao" id="descricao" aria-label="With textarea" required></textarea>
            </div>
        </div>

        


        <div class="row mb-3">
            <div class="text-center">
                <button class="btn btn-success" type="submit">Cadastrar</button> 
            </div>
        </div>


        
    </div>

    
</form>

@endsection