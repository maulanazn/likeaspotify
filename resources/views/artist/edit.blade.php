@extends('layouts.base')

@section('title')
    Edit as a artist
@endsection

@section('content') 
    <h1 class="text-secondary-emphasis mx-3 text-center">Edit as a artist</h1>
    <form action="{{route('artist_update', $artist->name)}}" method="POST" class="container mt-3 g-3">
        @method('PUT')
        @csrf
        <input type="text" class="form-control mb-3" name="name" id="name" value="{{$artist->name}}" placeholder="Name...">
        @error('name')
            <div>{{$message}}</div>
        @enderror

        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description...">{{$artist->description}}</textarea>
        @error('description')
            <div>{{$message}}</div>
        @enderror
                
        <input type="submit" class="btn btn-primary position-relative start-50 end-0" value="Submit">
    </form>
@endsection