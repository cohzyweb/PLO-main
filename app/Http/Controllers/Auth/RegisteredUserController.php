<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Enforce SMS verification
        if (!session('sms_verified') || !session('sms_phone_number')) {
            return redirect()->route('sms.verify.show')->withErrors(['phone' => 'Please verify your phone number before registering.']);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Member::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Member::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'tel' => $request->phone,
        ]);
        $member->assignRole('member');
        event(new Registered($member));

        // Auth::login($user);
        // Clear SMS verification session
        session()->forget('sms_verified');
        session()->forget('sms_phone_number');

        // return redirect(route('dashboard', absolute: false));
        return redirect(route('login'))->with('success', 'PLO会員登録が完了しました。');
    }
}
