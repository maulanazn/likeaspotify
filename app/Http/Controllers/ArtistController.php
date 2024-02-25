<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\User;
use App\Services\ArtistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArtistController extends Controller
{
    private ArtistService $artistService;

    public function __construct() {
        $this->artistService = new ArtistService();
    }

    public function create(): View
    {
        return view('artist.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        return $this->artistService->register($request);
    }

    public function edit(): View
    {
        return view(null);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        return $this->artistService->update($request, $id);
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $user_id = $request->session()->get('user_id');

        User::query()->find($user_id)->update([
            'is_artist' => 0
        ]);

        Artist::query()->find($id)->delete();

        $request->session()->invalidate();
        \Auth::logout();

        return redirect(route('login'));
    }

    public function dashboard(Request $request): View
    {
        $artist = Artist::query()->where('username', $request->session()->get('username'))->first();
        
        return view('artist.dashboard', compact('artist'));
    }
}
