@extends('layouts.base')

@section('title')
    Detail Song
@endsection

@extends('component.navbar-artist')

@section('content')
    <div class="container mt-3">        
        <!-- Form -->
        <form action="/song/{{$song->id}}" class="g-3 align-items-center" method="POST">
            @method('PUT')
            @csrf
            @if (session()->get('artist_id') === $song->artist)    
                <div class="col-auto">
                    <input type="text" class="form-control mb-3" name="album_id" id="album_id" value="{{$song->album_id}}" placeholder="Album (Optional)"/>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control mb-3" name="title" id="title" value="{{$song->title}}" placeholder="Title"/>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control mb-3" name="duration" id="duration" value="{{$song->duration}}" placeholder="Duration"/>
                </div>
                <div class="col-auto">
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description">{{$song->description}}</textarea>
                </div>
                @if($song->feat !== null)
                    <div class="col-auto">
                        Feat:
                    </div>
                    @foreach ($feats as $feat)
                        <div class="col-auto">
                            @for ($i = 0; $i < count($feat->feat); $i++)
                                <input type="checkbox" name="feat[]" id="feat[]" checked value="{{$feat->feat[$i]}}">
                                <label for="feat[]">{{$feat->feat[$i]}}</label>
                            @endfor
                        </div>
                    @endforeach
                @endif


                <input type="submit" value="Update" class="btn btn-primary" />
            @else
                <div class="col-auto">
                    <input type="text" class="form-control mb-3" readonly name="album_id" id="album_id" value="{{$song->album_id}}" placeholder="Album (Optional)"/>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control mb-3" readonly name="title" id="title" value="{{$song->title}}" placeholder="Title"/>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control mb-3" readonly name="duration" id="duration" value="{{$song->duration}}" placeholder="Duration"/>
                </div>
                <div class="col-auto">
                    <textarea name="description" id="description" readonly cols="30" rows="5" placeholder="Description">{{$song->description}}</textarea>
                </div>
                @if($song->feat !== null)
                    <div class="col-auto">
                        Feat?
                    </div>
                @endif
            @endif
        </form>
    </div>
    @error('name')
        <h1>{{$message}}</h1>
    @enderror
@endsection