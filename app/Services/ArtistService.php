<?php
namespace App\Services;

use App\Models\Artist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArtistService {
    public function register(Request $request): RedirectResponse {
        $username = session()->get('username');
        User::query()->where('name', $username)->update([
            'is_artist' => 1
        ]);
        
        $artist = Artist::query()->create([
            'username' => $username,
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        $request->session()->put('artist_id', $artist->id);

        return redirect(route('home'));
    }

    public function update(Request $request, string $id): RedirectResponse {
        $artist = Artist::query()->where('name', '=', $id)->first();
        
        $artist_query = Artist::query()->where('id', $artist->id)->first();
        Artist::query()->where('id', $artist->id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        Song::query()->where('artist', $artist_query->name)->update([
            'artist' => $artist_query->name
        ]);
        
        $song_update = Song::query()->where('artist', '=', $artist->name)->get();
        foreach ($song_update as $song) {
            for ($i=0; $i < count($song->feat); $i++) { 
                $data = "";
                if ($artist_query->name === $song->feat[$i]) {
                    $data = $song->feat[$i];
                    Song::query()->where('artist', $artist_query->name)->update([
                        'feat' => $data
                    ]);
                }
            }
        }

        return redirect(route('dashboard'));
    }
}