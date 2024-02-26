@extends('layouts.base')

@section('title')
    User Profile
@endsection

@extends('component.navbar')

@section('content')
    <div class="container mt-3">
        <h1>User Profile</h1>

        @if (\Auth::user()->is_artist)
            <p class="d-inline-flex p-2 text-bg-success rounded-5">verified ✓</p>
        @endif

        <form action="/user/{{$user->id}}" class="row g-3 align-items-center" method="POST">
            @csrf
            @method('PUT')
            <div class="col-auto">
                <input type="text" class="form-control mb-3" name="name" id="name" value="{{$user->name}}"/>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control mb-3" name="birthday" id="birthday" value="{{date_format(date_create($user->birthday), "Y-m-d")}}"/>
            </div>
            <input type="submit" class="btn btn-success position-relative start-50 mt-3 translate-middle" value="Save"/>
        </form>
        
        <form action="/user/{{$user->id}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    @error('name')
        <h1>{{$message}}</h1>
    @enderror
@endsection