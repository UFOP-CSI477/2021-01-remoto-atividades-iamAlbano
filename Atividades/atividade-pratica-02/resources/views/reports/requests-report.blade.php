@extends('layouts.basic', ['active' => 4])

@section('content')



<div class="container">
  
    <div class="row ">
      
        <div class="col">
            <table class="table table-light">

            <thead>
                <th scope="col" class="text-center">id</th>
                <th scope="col">Tipo</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data</th>
            </thead>

            <tbody>

            @foreach($requests as $request)   

            <tr class="align-middle">
            <td class="text-center">{{$request->id}}</td>
            <td>
                @foreach($subjects as $subject)
                    @if($subject->id == $request->subject_id)
                    {{$subject->name}}
                    @endif
                @endforeach
            </td>
            <td>{{$request->person}}</td>
            <td>{{$request->description}}</td>
            <td>{{ date('d/m/Y', strtotime($request->date))}}</td>

           

            @endforeach
            </tbody>


            </table>
        </div>  
        
        

        <div class="col">
            <table class="table table-light">

            <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th class="text-center">Qtde de protocolos</th>
                    <th scope="col">Preço</th>
                    <th class="text-center">Valor total</th>
                    </tr>
            </thead>

            @php
            $valorFinal = 0
            @endphp

            <tbody>
                @foreach($subjects as $subject)
                @php
                $quant = 0;
                $valorTotal = 0;
                @endphp
                <tr>

                    @foreach($requests as $request)
                    
                        @if($request->subject_id == $subject->id)
                            @php 
                                $quant += 1;
                                $valorTotal += $subject->price;
                                $valorFinal += $subject->price;
                            @endphp
                        @endif
                    @endforeach

                    <th scope="row">{{$subject->id}}</th>
                    <td>{{$subject->name}}</td>
                    <td class="text-center">{{$quant}}</td>
                    <td>R$ {{$subject->price}}</td>
                    <td class="text-center">R$ {{$valorTotal}}</td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                    <td class="text-end" colspan="5">Valor final: R$ {{$valorFinal}}</td>      
            </tfoot>

            </table>
        </div>

    </div>

</div>



 
@endsection

