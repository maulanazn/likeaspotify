@extends('layouts.base')

@section('title')
    Login
@endsection

@section('content')
    <h1 class="text-secondary-emphasis mx-3 text-center">Login</h1>
    <form action="/login" method="post" class="container mt-3 g-3">
        @csrf
        <input type="text" class="form-control border-2 mb-3" name="name" id="name" placeholder="Name..."/>    
        <input type="password" class="form-control border-2 mb-3" name="password" id="password" placeholder="Password..."/>
        
        <input type="submit" class="btn btn-primary position-relative start-50 end-0" value="Submit">
    </form>
@endsection