<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RideAssignMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private string $name,
        private string $number,
        private string $vehicle_name,
        private string $reg,
        private string $customer_name,
        private string $pickup,
        private string $drop,
        private string $date,
        private string $time,
        private string $fare



    ) {
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ride Assign Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'emails.ride-assign',
            with: [
                'name' => $this->name,
                'number' => $this->number,
                'vehicle_name' => $this->vehicle_name,
                'reg' => $this->reg,
                'customer_name' => $this->customer_name,
                'pickup' =>$this->pickup,
                'drop' => $this->drop,
                'date' => $this->date,
                'time' => $this->time,
                'fare' =>$this->fare

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
