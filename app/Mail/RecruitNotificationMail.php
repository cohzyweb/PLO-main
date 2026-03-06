<?php

namespace App\Mail;

use App\Models\RecruitApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecruitNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public RecruitApplication $application;

    /**
     * Create a new message instance.
     */
    public function __construct(RecruitApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $typeLabel = $this->application->type === 'male' ? '男性' : '女性';
        return new Envelope(
            subject: '【新規応募】' . $typeLabel . '求人応募がありました',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.recruit.notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
