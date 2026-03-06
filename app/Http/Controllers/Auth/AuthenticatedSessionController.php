<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login',['errors' => new MessageBag()]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.home', absolute: false));
    }

    public function frontLogin(): View
    {
        // dd('frontLogin');
        // dd(session()->all());
        return view('auth.frontlogin');
    }

    public function frontStore(LoginRequest $request): RedirectResponse
    {
        $request->authenticateMultiple();

        $request->session()->regenerate();
        // dd($request->isAdmin());
        if ($this->isAdmin()) {
            // dd('admin');
            return redirect('/');
            // return redirect()->intended(route('admin.home', absolute: false));
        } else {
            // dd(session('user_type'));
            // return redirect()->intended(route('public.group.home', absolute: false));
            return redirect('/');
        }
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 現在のユーザータイプを取得
        Log::info('destroy');
        $userType = session('user_type');
        Log::info($userType);
        // 両方のガードからログアウト
        if (Auth::guard('web')->check()) {
            // dd('web');
            Auth::guard('web')->logout();
        }
        if (Auth::guard('member')->check()) {
            // dd('member');
            Auth::guard('member')->logout();
        }

        // セッションからユーザータイプを削除
        $request->session()->forget('user_type');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // $request->session()->clear();
        // $request->session()->flush();

        // ユーザータイプに応じてリダイレクト先を決定
        if ($userType === 'member') {
            return redirect('/login');
        } else {
            return redirect('/admin/login');
        }
    }

    /**
     * Get the currently authenticated user from any guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getCurrentUser()
    {
        // まずwebガードで認証されているかチェック
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user();
        }

        // 次にmemberガードで認証されているかチェック
        if (Auth::guard('member')->check()) {
            return Auth::guard('member')->user();
        }

        return null;
    }

    /**
     * Get the current user type.
     *
     * @return string|null
     */
    public function getCurrentUserType(): ?string
    {
        return session('user_type');
    }

    /**
     * Check if the current user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->getCurrentUserType() === 'admin';
    }

    /**
     * Check if the current user is a member.
     *
     * @return bool
     */
    public function isMember(): bool
    {
        return $this->getCurrentUserType() === 'member';
    }

    /**
     * Logout from all guards and redirect appropriately.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoutAll(Request $request): RedirectResponse
    {
        Log::info('logoutAll');
        return $this->destroy($request);
    }
}
