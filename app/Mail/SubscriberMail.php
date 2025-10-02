<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;

    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    public function build()
    {
        return $this->subject('Subscriber Mail')
                    ->view('emails.subscriber',[
                        'blog'=>$this->blog
                    ]);
    }
}
