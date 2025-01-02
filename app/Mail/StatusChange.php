<?php

namespace App\Mail;

use App\Models\Enquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusChange extends Mailable
{
    use Queueable, SerializesModels;
    
    public $enquiry;
    public $status_message;

    /**
     * Create a new message instance.
     */
    public function __construct(Enquiry $enquiry, $status_message)
    {
        $this->enquiry = $enquiry;
        $this->status_message = $status_message;
        // echo 'status_message 2 = '.$status_message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Status Change',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.statusChange',
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
