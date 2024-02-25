@extends('layouts.base')

@section('title')
    Add Song
@endsection

@extends('component.navbar-artist')

@section('content')
    <div class="container mt-3">
        
        <h1>Add Song</h1>
        <!-- Form -->
        <form action="/user/update/{{$user->id}}" class="row g-3 align-items-center" method="POST">
            @csrf
            @method('PUT')
            <div class="col-auto">
                <input type="text" class="form-control mb-3" name="name" id="name" value="{{$user->name}}"/>
            </div>
            <div class="col-auto">
                <input type="date" class="form-control mb-3" name="birthday" id="birthday" value="{{str(date_format(date_create($user->birthday), "Y-m-d"))}}"/>
            </div>
            <input type="submit" class="btn btn-success position-relative start-50 mt-3 translate-middle" value="Save"/>
        </form>
    </div>
    @error('name')
        <h1>{{$message}}</h1>
    @enderror
@endsection