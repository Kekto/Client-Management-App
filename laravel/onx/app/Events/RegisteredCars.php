<?php

namespace App\Events;

use App\Models\Car;
use Illuminate\Queue\SerializesModels;

class RegisteredCars
{
    use SerializesModels;

    public $clientId;
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }
}
