<?php

namespace App\Providers;

use App\Feedback;
use App\FeedbackEmail;
use App\Http\Models\Bot\Cars;
use App\Http\Models\Bot\CarsModerations;
use App\Http\Models\Bot\SupportMessages;
use App\Observers\CarsModerationObserver;
use App\Observers\CarsObserver;
use App\Observers\FeedbackObserver;
use App\Observers\OrderObserver;
use App\Observers\SupportMessagesObserber;
use App\Observers\UserObererver;
use App\Order;
use App\User;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }





    public function boot()
    {
        Order::observe(OrderObserver::class);
    }
}
