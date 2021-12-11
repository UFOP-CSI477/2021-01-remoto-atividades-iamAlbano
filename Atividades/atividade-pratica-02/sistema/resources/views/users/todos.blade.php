@extends('layouts.basic')

@section('content')


@include('menu')
<div class="bg bg-light position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>

        </tr>
    </thead>
    <tbody>

        @foreach($users as $user)

            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>

        @endforeach

    </tbody>
    </table>
</div>
@endsection