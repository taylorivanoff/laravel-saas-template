<?php

namespace Template\Domain\Auth\Listeners;

use Template\Domain\Auth\Mail\ActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user)
            ->send(new ActivationEmail(
                $event->user->generateConfirmationToken(),
                $event->user)
            );
    }
}
