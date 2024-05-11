<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'phone',
        'address',
        'type',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'client_id');
    }

    // Define the appointments relationship
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'client_id', 'client_id');
    }


}
