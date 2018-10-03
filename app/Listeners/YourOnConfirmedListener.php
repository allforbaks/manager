<?php

namespace App\Listeners;

use \BeyondCode\EmailConfirmation\Events\Confirmed;

class YourOnConfirmedListener
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
     * @param  Confirmed  $event
     * @return void
     */
    public function handle(Confirmed $event)
    {
        //
    }
}
