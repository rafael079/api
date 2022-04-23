<?php

namespace App\Listeners;

use App\Events\CreateOrUpdateProduct;
use App\Mail\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateOrUpdateProduct  $event
     * @return void
     */
    public function handle(CreateOrUpdateProduct $event)
    {
        Mail::to($event->products->store->email)->send(new SendMail($event->products));
    }
}
