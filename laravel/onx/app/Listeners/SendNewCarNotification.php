<?php

namespace App\Listeners;

use App\Models\Client;
use App\Notifications\NewCarNotifications;
use Illuminate\Support\Facades\Notification;
use App\Notifications;

class SendNewCarNotification
{
    public function handle($event){
        $clients = Client::where('id',$event->clientId)->get();

        Notification::send($clients, new NewCarNotifications($event->clientId));
    }
}
