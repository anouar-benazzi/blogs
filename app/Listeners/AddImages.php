<?php

namespace App\Listeners;

use App\Models\Images;
use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddImages
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
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        //
                  $image = Images::create(['photo'=>'poop',
                  'imageable_type' => 'App\Models\Post',
                 'imageable_id'=> $event->post->id]);

    }
}
