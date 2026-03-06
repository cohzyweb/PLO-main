<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\RecruitThankYouMail;
use App\Mail\RecruitNotificationMail;
use App\Models\RecruitApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RecruitController extends Controller
{
    /**
     * Display the male recruit page.
     */
    public function showMale(): View
    {
        return view('public.recruit.male');
    }

    /**
     * Display the female recruit page.
     */
    public function showFemale(): View
    {
        return view('public.recruit.female');
    }

    /**
     * Handle the recruit form submission.
     */
    public function submitForm(Request $request)
    {
        $type = (string) $request->input('type');

        $rules = [
            'type' => ['required', Rule::in(['male', 'female'])],
            'shop' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'nullable|string|max:50',
            'experience' => 'nullable|string|max:255',
            'inquiry' => 'required|string|max:5000',
            'furigana' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'privacy' => 'nullable',
        ];

        if ($type === 'male') {
            $rules['furigana'] = 'required|string|max:255';
        }

        if ($type === 'female') {
            $rules['email'] = 'required|email|max:255|confirmed';
            $rules['subject'] = 'required|string|max:255';
            $rules['privacy'] = 'required|accepted';
        }

        $validated = $request->validate($rules);

        $application = RecruitApplication::create([
            'type' => $validated['type'],
            'shop' => $validated['shop'],
            'name' => $validated['name'],
            'furigana' => $validated['furigana'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'age' => $validated['age'] ?? null,
            'experience' => $validated['experience'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'inquiry' => $validated['inquiry'],
            'privacy_agreed' => (bool) ($validated['privacy'] ?? false),
            'meta' => [
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
            ],
            'status' => 'new',
        ]);

        try {
            // Gửi thank-you email cho người đăng ký
            Mail::to($validated['email'])->send(new RecruitThankYouMail());
        } catch (\Throwable $e) {
            Log::error('Failed to send recruit thank-you mail', [
                'email' => $validated['email'],
                'type' => $validated['type'],
                'message' => $e->getMessage(),
            ]);
        }

        try {
            // Gửi notification email đến todinhthi@gmail.com
            // Sử dụng mailer 'en_smtp' với credentials từ info@plo-group.jp (dùng chung với default mailer)
            Mail::mailer('en_smtp')
                ->to('todinhthi@gmail.com')
                ->send(new RecruitNotificationMail($application));
        } catch (\Throwable $e) {
            Log::error('Failed to send recruit notification mail', [
                'application_id' => $application->id,
                'email' => $validated['email'],
                'type' => $validated['type'],
                'message' => $e->getMessage(),
            ]);
        }

        return redirect()->back()->with('success', 'お問い合わせありがとうございます。担当者よりご連絡いたします。');
    }
}
