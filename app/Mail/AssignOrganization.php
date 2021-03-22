<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Process_item;

class AssignOrganization extends Mailable
{
    use Queueable, SerializesModels;

    public $process_item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Process_item $process_item)
    {
        $this->process_item=$process_item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.assignorg');
    }
}
