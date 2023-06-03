<?php

namespace App\Providers;

use App\Events\AnImageRecordDeletedFromImagesTable;
use App\Events\NewRateHasBeenCreated;
use App\Events\RateHasBeenUpdated;
use App\Events\UserLogin;
use App\Listeners\DeleteImageFromStorage;
use App\Listeners\IncrementPageTableRateField;
use App\Listeners\SendSMSVerification;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\CurrentDeviceLogout;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Validated;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewRateHasBeenCreated::class => [
            IncrementPageTableRateField::class,
        ],
        RateHasBeenUpdated::class => [
            IncrementPageTableRateField::class
        ],
        AnImageRecordDeletedFromImagesTable::class => [
            DeleteImageFromStorage::class
        ],
        Registered::class => [
            \App\Listeners\AuthListener\Log\Registered::class
        ],

        Attempting::class => [
        ],

        Authenticated::class => [

        ],

        Login::class => [
            \App\Listeners\AuthListener\Log\Login::class
        ],

        Failed::class => [
        ],

        Validated::class => [
        ],

        Verified::class => [
        ],

        Logout::class => [
            \App\Listeners\AuthListener\Log\Logout::class
        ],

        CurrentDeviceLogout::class => [
        ],

        OtherDeviceLogout::class => [
        ],

        Lockout::class => [
        ],

        PasswordReset::class => [
        ],

        UserLogin::class => [
            SendSMSVerification::class
        ]
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
