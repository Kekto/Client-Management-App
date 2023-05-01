<?php

namespace App\Listeners;

use App\Models\Client;
use Illuminate\Notifications\Notification;

class SendNewCarNotification
{
    public function handle($event){
        return ($event);
        $clients = Client::where('id',$event->car->client_id)->get();

        Notification::send($clients, new SendNewCarNotification($event->car));
    }
}
