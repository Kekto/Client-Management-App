<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Notification;

class NewCarNotifications extends Notification{

    use Queueable;

    public function __construct($car){
        $this->car = $car;
    }

    public function via($notifiable){
        return ['database'];
    }
    public function toArray($notifiable){
        return [
            'model' => $this->car->model,
            'status' => $this->car->status,
        ];
    }
}
