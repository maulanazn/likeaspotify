@extends('layouts.base')

@section('title')
    Add Song
@endsection

@extends('component.navbar-artist')

@section('content')
    <div class="container mt-3">
        
        <h1>Add Song</h1>
        <!-- Form -->
        <form action="/song/" class="g-3 align-items-center" method="POST">
            @csrf
            <div class="col-auto">
                <input type="text" class="form-control mb-3" name="album_id" id="album_id" placeholder="Album (Optional)"/>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control mb-3" name="title" id="title" placeholder="Title"/>
            </div>
            <div class="col-auto">
                <input type="number" class="form-control mb-3" name="duration" id="duration" placeholder="Duration"/>
            </div>
            <div class="col-auto">
                <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"></textarea>
            </div>
            <div class="col-auto">
                Feat:
            </div>
            @foreach ($feats as $feat)
                <div class="col-auto">
                    <input type="checkbox" name="feat[]" id="feat[]" value="{{$feat->name}}">
                    <label for="feat[]">{{$feat->name}}</label>
                </div>
            @endforeach
            <input type="submit" class="btn btn-success position-relative start-50 mt-3 translate-middle" value="Save"/>
        </form>
    </div>
    @error('name')
        <h1>{{$message}}</h1>
    @enderror
@endsection