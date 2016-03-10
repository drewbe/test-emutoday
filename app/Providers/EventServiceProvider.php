<?php

namespace emutoday\Providers;

use emutoday\StoryImage;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
         'Illuminate\Auth\Events\Login' => [
            'emutoday\Listeners\UpdateLastLoginAtOnLogin@handle',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        StoryImage::saving(function ($storyImage)
        {
            $storyImage->filename = $storyImage->image_name . '.' . $storyImage->image_extension;

       });

        //
    }
}
