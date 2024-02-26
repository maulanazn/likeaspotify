<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register_view(): View {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'birthday' => ['required', 'date'],
        ]);

        return $this->userService->register($request);
    }

    public function login_view(): View {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        return $this->userService->login($request);
    }

    public function logout(Request $request): RedirectResponse {
        \Auth::logout();

        $request->session()->invalidate();
        
        return redirect(route('login'));
    }

    public function user_by_id(int $id): View 
    {
        $user = User::query()->where('id', $id)->first();

        return view('user.user_profile', compact('user'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'birthday' => ['required', 'date_format:Y-m-d']
        ]);

        return $this->userService->update($request, $id);
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::find($id);

        $user->delete();

        return redirect(route('register'));
    }
}