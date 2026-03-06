<?php

namespace App\Console\Commands;

use App\Mail\RecruitNotificationMail;
use App\Mail\RecruitThankYouMail;
use App\Models\RecruitApplication;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestRecruitEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recruit:test-email 
                            {--type=male : Application type (male or female)}
                            {--to= : Email address to send test notification (default: todinhthi@gmail.com)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test recruit email sending functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->option('type');
        $toEmail = $this->option('to') ?: 'todinhthi@gmail.com';

        $this->info('Testing Recruit Email Functionality...');
        $this->newLine();

        // Display current mail configuration
        $this->info('Current Mail Configuration:');
        $this->line('  Default Mailer: ' . config('mail.default'));
        $this->line('  SMTP Host: ' . config('mail.mailers.smtp.host'));
        $this->line('  SMTP Port: ' . config('mail.mailers.smtp.port'));
        $this->line('  SMTP Encryption: ' . config('mail.mailers.smtp.encryption'));
        $this->line('  SMTP Username: ' . config('mail.mailers.smtp.username'));
        $this->line('  SMTP Password: ' . (config('mail.mailers.smtp.password') ? '***' : 'NOT SET'));
        $this->newLine();

        $this->info('en_smtp Mailer Configuration:');
        $this->line('  SMTP Host: ' . config('mail.mailers.en_smtp.host'));
        $this->line('  SMTP Port: ' . config('mail.mailers.en_smtp.port'));
        $this->line('  SMTP Encryption: ' . config('mail.mailers.en_smtp.encryption'));
        $this->line('  SMTP Username: ' . config('mail.mailers.en_smtp.username'));
        $this->line('  SMTP Password: ' . (config('mail.mailers.en_smtp.password') ? '***' : 'NOT SET'));
        $this->newLine();

        // Create a test application
        $this->info('Creating test application...');
        $application = RecruitApplication::create([
            'type' => $type,
            'shop' => 'テスト店舗',
            'name' => 'テスト太郎',
            'furigana' => 'テストタロウ',
            'email' => 'test@example.com',
            'phone' => '090-1234-5678',
            'age' => '25',
            'experience' => 'あり',
            'subject' => 'テスト件名',
            'inquiry' => 'これはテストメールです。',
            'privacy_agreed' => true,
            'meta' => [
                'ip' => '127.0.0.1',
                'user_agent' => 'Test Command',
            ],
            'status' => 'new',
        ]);

        $this->info("Created test application ID: {$application->id}");
        $this->newLine();

        // Test 1: Thank-you email (default mailer)
        $this->info('Test 1: Sending thank-you email (default mailer)...');
        try {
            Mail::to('test@example.com')->send(new RecruitThankYouMail());
            $this->info('✅ Thank-you email sent successfully!');
        } catch (\Throwable $e) {
            $this->error('❌ Failed to send thank-you email: ' . $e->getMessage());
            Log::error('Test thank-you email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
        $this->newLine();

        // Test 2: Notification email (en_smtp mailer)
        $this->info("Test 2: Sending notification email to {$toEmail} (en_smtp mailer)...");
        try {
            Mail::mailer('en_smtp')
                ->to($toEmail)
                ->send(new RecruitNotificationMail($application));
            $this->info('✅ Notification email sent successfully!');
            $this->info("   Please check {$toEmail} inbox (and spam folder).");
        } catch (\Throwable $e) {
            $this->error('❌ Failed to send notification email: ' . $e->getMessage());
            $this->error('   Error details: ' . $e->getFile() . ':' . $e->getLine());
            Log::error('Test notification email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
        $this->newLine();

        // Cleanup test application
        $this->info('Cleaning up test application...');
        $application->delete();
        $this->info('✅ Test application deleted.');

        $this->newLine();
        $this->info('Test completed! Check logs at storage/logs/laravel.log for details.');
    }
}
