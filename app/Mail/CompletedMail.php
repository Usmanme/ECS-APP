<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private string $date,
        private string $time,
        private string $customer_name,
        private string $customer_number,
        private string  $passenger,
        private string $car_name,
        private string $payment_type,
        private string $pickup,
        private string $drop,
        private string $fare,

    ) {
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ride Completed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'emails.completed-mail',
            with: [
                'date' => $this->date,
                'time' => $this->time,
                'name' => $this->customer_name,
                'number' => $this->customer_number,
                'passenger' => $this->passenger,
                'car_name' => $this->car_name,
                'payment_type' =>$this->payment_type,
                'pickup' =>$this->pickup,
                'drop' => $this->drop,
                'fare' =>$this->fare,

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
