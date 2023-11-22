<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->view('emails.contact')->with([
            'name' => $this->request->input('name'),
            'email' => $this->request->input('email'),
            'subject' => $this->request->input('subject'),
            'message' => $this->request->input('message'),
        ])->subject($this->request->input('subject'));
    }
}
