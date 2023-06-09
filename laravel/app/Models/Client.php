<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory,Notifiable;

    protected $table = "clients";
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'phone_number',
        'email',
        'employee_id',
    ];
}
