<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 
        'prospect_id', 
        'salesperson_id', 
        'date_time', 
        'location', 
        'status',
    ];

    /**
     * Les attributs qui doivent être convertis en types de données natives.
     *
     * @var array
     */
    protected $casts = [
        'date_time' => 'datetime',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id'); 
    }

    public function prospect()
    {
        return $this->belongsTo(Prospect::class, 'prospect_id', 'prospect_id');
    }

    public function salesperson()
    {
        return $this->belongsTo(Employer::class, 'salesperson_id', 'employer_id');
    }

}
