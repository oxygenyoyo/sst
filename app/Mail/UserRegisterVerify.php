<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterVerify extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $verify_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\User $user, $verify_link)
    {
        $this->user = $user;
        $this->verify_link = $verify_link;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify',['user' => $this->user, 'verify_link' => $this->verify_link]);
    }
}
