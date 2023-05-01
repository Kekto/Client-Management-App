<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Notification;

class NewCarNotifications extends Notification{

    use Queueable;

    public $clientId;

    public function __construct($clientId){
        $this->clientId = $clientId;
    }

    public function via($notifiable){
        return ['database'];
    }
    public function toArray($notifiable){
        return [
            'carId' => $this->clientId
        ];
    }
}
