@extends('layouts.dashboard')

@section('title')
    Your Songs
@endsection

@extends('component.navbar-artist')

@section('content')
    <div class="container row">
        @foreach ($songs as $song)
            <div class="postion-relative start-0 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$song->title}} {{$song->album_id ?? ($song->album_id)}}</h5>
                    <p class="card-text">{{$song->artist}} <a href="#">{{$song->feat ? join(", ", $song->feat) : null}}</a></p>
                    <p class="card-text">{{$song->duration}}</p>
                    @if (session()->get('artist_id') === $song->artist)
                        <a href="/song/{{$song->id}}" class="btn btn-primary">Check song</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection