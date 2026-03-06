<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class TestMailController extends Controller
{
    /**
     * Show test email form
     */
    public function show(): View
    {
        return view('admin.test-mail');
    }

    /**
     * Send test email
     */
    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'mailer' => 'nullable|in:smtp,en_smtp',
        ]);

        $to = $request->input('to');
        $mailer = $request->input('mailer', 'smtp');

        try {
            // Display current mail configuration
            $config = [
                'default_mailer' => config('mail.default'),
                'smtp_host' => config("mail.mailers.{$mailer}.host"),
                'smtp_port' => config("mail.mailers.{$mailer}.port"),
                'smtp_encryption' => config("mail.mailers.{$mailer}.encryption"),
                'smtp_username' => config("mail.mailers.{$mailer}.username"),
                'smtp_password_set' => !empty(config("mail.mailers.{$mailer}.password")),
                'ehlo_domain' => config("mail.mailers.{$mailer}.local_domain"),
            ];

            // Send test email
            Mail::mailer($mailer)
                ->to($to)
                ->send(new TestMail($mailer));

            return response()->json([
                'success' => true,
                'message' => "Email đã được gửi thành công đến {$to}",
                'config' => $config,
                'mailer_used' => $mailer,
            ]);
        } catch (\Throwable $e) {
            Log::error('Test email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'mailer' => $mailer,
                'to' => $to,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gửi email thất bại: ' . $e->getMessage(),
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'config' => $config ?? [],
            ], 500);
        }
    }
}
