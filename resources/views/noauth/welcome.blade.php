@extends('layouts.base')

@section('title')
    Welcome
@endsection

@extends('component.navbar')

@section('content')
    @error('error')
        <h1>{{$message}}</h1>
    @enderror
    <h1 class="text-center">Welcome page</h1>
@endsection