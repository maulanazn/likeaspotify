@extends('layouts.base')

@section('title')
    Register as a artist
@endsection

@section('content') 
    <h1 class="text-secondary-emphasis mx-3 text-center">Register as a artist</h1>
    <form action="{{route('artist_update', $artist->id)}}" method="PUT" class="container mt-3 g-3">
        @csrf
        <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Name...">
        @error('name')
            <div>{{$message}}</div>
        @enderror

        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description..."></textarea>
        @error('description')
            <div>{{$message}}</div>
        @enderror
                
        <input type="submit" class="btn btn-primary position-relative start-50 end-0" value="Submit">
    </form>
@endsection