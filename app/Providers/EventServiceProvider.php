<?php

namespace App\Providers;

use App\Events\LogEvent;
use App\Models\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],


        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\Microsoft\MicrosoftExtendSocialite::class.'@handle',
            // 'SocialiteProviders\\Microsoft\\MicrosoftExtendSocialite@handle',
            \SocialiteProviders\Azure\AzureExtendSocialite::class.'@handle',
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(LogEvent::class, function ($event) {
            Log::create($event->log);
            // \Log::info("User login:  event: " . json_encode($event) );
        });

        // Event::listen(\Illuminate\Auth\Events\Logout::class, function ($event) {
        //     \Log::info("User logout: {$event->user->name} event: " . json_encode($event));
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
