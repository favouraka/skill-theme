<?php

namespace App\Mail;

use App\Models\FormResponse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public FormResponse $formResponse;

    /**
     * Create a new message instance.
     */
    public function __construct(FormResponse $formResponse)
    {
        $this->formResponse = $formResponse;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject('New Form Submission - ' . $this->formResponse->service_requested)
                    ->view('emails.form-submission-notification')
                    ->text('emails.form-submission-notification-text')
                    ->with([
                        'formResponse' => $this->formResponse,
                    ]);
    }
}
