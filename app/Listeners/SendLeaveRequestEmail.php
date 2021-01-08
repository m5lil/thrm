<?php

namespace App\Listeners;

use App\Events\LeaveRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLeaveRequestEmail
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
     * @param  LeaveRequest  $event
     * @return void
     */
    public function handle(LeaveRequest $event)
    {
        // Send an email for employee

        // Send an email for HR
    }
}
