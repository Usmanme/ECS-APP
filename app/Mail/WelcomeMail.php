<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
       public function __construct(
        private string $amount,
        private string $location_from,
        private string  $location_to,
        private string $trip_cat,
        private string $trip_date,
        private string $trip_time,
        private string $trip_type,
        private string $vat,
        private string $totalAmount
        
        
    ) {
    }

    /**
     * Get the message envelope.
     */
     public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ECS Booking Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
public function content(): Content
    {
        
        return new Content(
            view: 'emails.welcome',
            with: [
                'amount' => $this->amount,
                    'location_from' => $this->location_from,
                    'location_to' => $this->location_to,
                    'trip_cat'=> $this->trip_cat,
                    'trip_date'=> $this->trip_date,
                    'trip_time'=> $this->trip_time,
                    'trip_type'=> $this->trip_type,
                    'vat' => $this->vat,
                    'totalAmount' => $this->totalAmount
            ],
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
