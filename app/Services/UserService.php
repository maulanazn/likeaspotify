<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserService {
    public function register(Request $request): RedirectResponse {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'birthday' => $request->birthday,
        ]);

        return redirect(route('login'));
    }

    public function login(Request $request) {
        if (\Auth::guard('web')->attempt($request->only(['name', 'password']))) {
            $request->session()->put('username', $request->name);
            
            return redirect(route('home'));
        }
        
        return redirect(route('login'));
    }

    public function update(Request $request, int $id): RedirectResponse|View
    {
        $user_id = User::find($id);
        
        $user_id->update([
            'name' => $request->name,
            'birthday' => $request->birthday
        ]);

        return redirect(route('user_profile', $user_id->id));
    }
}