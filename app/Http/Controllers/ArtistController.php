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
        $artist = Artist::query()->where('name', '=', session()->get('artist_id'))->first();

        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        return $this->artistService->update($request, $id);
    }

    public function dashboard(Request $request): View
    {
        $artist = Artist::query()->where('username', $request->session()->get('username'))->first('name');

        $request->session()->put('artist_id', $artist->name);

        return view('artist.dashboard', compact('artist'));
    }
}
