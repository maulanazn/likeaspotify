@extends('layouts.base')

@section('title')
    Register
@endsection

@section('content') 
    <h1 class="text-secondary-emphasis mx-3 text-center">Register</h1>
    <form action="/register" method="post" class="container mt-3 g-3">
        @csrf
        <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Name...">
        @error('name')
            <div>{{$message}}</div>
        @enderror
        <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Email...">
        @error('email')
            <div>{{$message}}</div>
        @enderror
        <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Password...">
        @error('password')
            <div>{{$message}}</div>
        @enderror
        <input type="date" class="form-control mb-3" name="birthday" id="birthday" placeholder="Birthday..."/>
        @error('birthday')
            <div>{{$message}}</div>
        @enderror
        
        <input type="submit" class="btn btn-primary position-relative start-50 end-0" value="Submit">
    </form>
@endsection