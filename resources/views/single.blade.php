@extends('layouts.master')


@section('title', 'SINGLE')

@section('content')
    <h1>Selamat</h1>
    <h2>{{$blog}}</h2>

    @foreach($users as $user)
    <li>{{ $user->name}}</li>
    @endforeach

@endsection