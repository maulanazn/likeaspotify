<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::query()->where('artist', session()->get('artist_id'))->orWhere('feat', 'LIKE', '%'.session()->get('artist_id').'%')->get();

        return view('song.list_songs', [
            'songs' => $songs,
        ]);
    }
    
    public function create(): View
    {
        $feats = Artist::query()->where('name', '!=', session()->get('artist_id'))->limit(10)->get();

        return view('song.add_song', [
            'feats' => $feats,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'album_id' => ['nullable', 'string'],
            'title' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'artist' => ['string'],
            'feat' => ['nullable', 'array']
        ]);

        Song::query()->create([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
            'artist' => session()->get('artist_id'),
            'feat' => $request->feat
        ]);

        return redirect(route('dashboard'));
    }

    public function show(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}
