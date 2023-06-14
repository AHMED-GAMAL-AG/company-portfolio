<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $message;
    protected $subscribers;

    /**
     * Create a new job instance.
     */
    public function __construct( $subject,  $message, $subscribers)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber)->send(new SendEmail($this->subject, $this->message));
        }
    }
}
