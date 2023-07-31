<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShareLink extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $message, private $validatedData, private $path)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Share Link',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.shareLink',
            with: [
                'message' => $this->message,
                'title' => $this->validatedData['title'],
                'path' => $this->path,
            ],

        );
    }

    public function attachments(): array
    {
        return [];
    }
}
