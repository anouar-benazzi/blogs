<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Events\AdminCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddAdmin
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
     * @param  \App\Events\AdminCreated  $event
     * @return void
     */
    public function handle(AdminCreated $event)
    {
        
        if ($event->user->role_id == 2) {
            $admin = Admin::create(['email'=>$event->user->email,
           'password' => $event->user->password]);
              } 
    }
}
