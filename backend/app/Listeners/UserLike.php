<?php

namespace App\Listeners;

use App\Events\Like;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
class UserLike
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
     * @param  Like  $event
     * @return void
     */
    public function handle(Like $event)
    {
        Log::info('Deu match');
    }
}
