<?php

namespace Template\App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Template\Domain\Auth\Events\UserRequestedActivationEmail;
use Template\Domain\Auth\Events\UserSignedUp;
use Template\Domain\Auth\Listeners\CreateDefaultTeam;
use Template\Domain\Auth\Listeners\SendActivationEmail;
use Template\Domain\Company\Listeners\CompanyUserEventSubscriber;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserSignedUp::class => [
            CreateDefaultTeam::class,
            SendActivationEmail::class,
        ],
        UserRequestedActivationEmail::class => [
            SendActivationEmail::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        CompanyUserEventSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
