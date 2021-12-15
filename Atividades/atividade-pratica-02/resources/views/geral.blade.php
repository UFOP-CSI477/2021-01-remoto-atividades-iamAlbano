@extends('layouts.basic', ['active' => 1])

@section('content')


<table class="table">
  <thead>
    <tr class="sticky-top bg bg-light">
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
    </tr>
  </thead>
  <tbody>

  @foreach($subjects as $subject)
    <tr>
      <td>{{$subject->id}}</td>
      <td>{{$subject->name}}</td>
      <td>{{$subject->price}}</td>
    </tr>
   @endforeach
      
    
    
  </tbody>
</table>
@endsection