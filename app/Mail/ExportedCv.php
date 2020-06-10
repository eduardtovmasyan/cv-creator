<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExportedCv extends Mailable
{
    use Queueable;

    /**
     * @var string
     */
    protected $cvUrl;

    /**
     * @var string
     */
    protected $userName;

    /**
     * Create a new message instance.
     *
     * @param  string  $cvUrl
     * @param  string  $userName
     * @return void
     */
    public function __construct(string $cvUrl, string $userName)
    {
        $this->cvUrl = $cvUrl;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('exported-cv');
    }
}
