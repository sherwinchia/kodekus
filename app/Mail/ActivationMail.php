<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $vToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $vToken)
    {
      $this->user = $user;
      $this->vToken = $vToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('browser.mails.activation')
        ->with([
          'user' => $this->user,
          'vToken' => $this->vToken
        ])
        ->subject(config('app.name') . ' - Account Activation');
    }
}
