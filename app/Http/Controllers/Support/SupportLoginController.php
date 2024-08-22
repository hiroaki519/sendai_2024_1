<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SupportLoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('support.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        session()->flash('success', 'ログインしました!');

        return redirect()->intended(route('support.home'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('support')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('success', 'ログアウトしました!');

        return redirect(route('support.login'));
    }
}
