@extends('layouts.dashboard')

@section('title')
    Dashboard Artist
@endsection

@section('content')
    <h1 class="text-center mt-3">Welcome <span class="text-uppercase">{{$artist->name}}</span></h1>
@endsection