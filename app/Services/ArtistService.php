<?php
namespace App\Services;

use App\Models\Artist;
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

    public function update(Request $request, int $id): RedirectResponse {
        Artist::query()->find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect(route('dashboard'));
    }
}