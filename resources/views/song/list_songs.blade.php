@extends('layouts.dashboard')

@section('title')
    Your Songs
@endsection

@extends('component.navbar-artist')

@section('content')
    @foreach ($songs as $song)
        <div class="postion-relative start-50 card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$song->title}} {{$song->album_id ?? ($song->album_id)}}</h5>
                <p class="card-text">{{$song->artist}} <a href="#">{{$song->feat ? join(", ", $song->feat) : null}}</a></p>
                <p class="card-text">{{$song->duration}}</p>
                @if ($song->feat === null)
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                @endif
            </div>
        </div>
    @endforeach
@endsection