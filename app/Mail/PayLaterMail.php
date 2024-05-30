<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class PaylaterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */



     public function __construct(
         public string $name,
        public string $pickup,
        public string $drop,
        public string $date,
        public string $time,
        public string $fare,

    ) {
    }

    public function build()
    {
        return $this->view('emails.pay-later')
                    ->with([
                        'name' => $this->name,
                        'pickup' => $this->pickup,
                        'drop' => $this->drop,
                        'date' =>$this->date,
                        'time' => $this->time,
                        'fare' => $this->fare,

                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pay Later Mail',
        );
    }

    /**
     * Get the message content definition.
     */


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
