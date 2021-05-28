<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('email.verification',[
            'user' => $this->user,
        ]);
    }
}
