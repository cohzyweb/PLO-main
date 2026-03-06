<?php

namespace App\Mail;

use App\Models\RecruitApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecruitApplicationNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public RecruitApplication $application)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $typeLabel = $this->application->type === 'male' ? 'male' : 'female';

        return new Envelope(
            subject: "Recruit application submitted ({$typeLabel})"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            text: 'emails.recruit.notification',
            with: [
                'application' => $this->application,
            ]
        );
    }
}
