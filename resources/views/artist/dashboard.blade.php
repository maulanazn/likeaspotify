@extends('layouts.base')

@section('title')
    Dashboard Artist
@endsection

@extends('component.navbar-artist')

@section('content')
<h1 class="text-center mt-3">Welcome <span class="text-uppercase">{{$artist->username}}</span></h1>
@endsection