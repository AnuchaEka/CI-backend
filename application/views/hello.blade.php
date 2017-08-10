@extends('master')
 
@section('title', 'Codeigniter 3 y Blade')
 
@section('sidebar')
    @parent
 
    <p>Sidebar.</p>
@endsection
 
@section('content')
    <p>Hola {{ $uri->segment(2) }}</p>
    @if(sizeof($users) > 0)
        @foreach($users as $user)
            <p>{{ $user }}</p>
        @endforeach
    @endif
@endsection

