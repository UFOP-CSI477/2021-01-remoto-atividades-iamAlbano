@extends('layouts.basic', ['active' => 4])

@section('content')

<table class="table">
  <thead class="sticky-top ">
    <tr class="bg bg-light ">
      <th scope="col" class="text-center">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th> 
    </tr>


  </thead>

  <tbody class="tabela">  
  @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    </tr>
   @endforeach

  </tbody>

</table>

@endsection