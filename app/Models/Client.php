<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory; // Utilise le trait HasFactory pour intégrer les capacités des usines de modèles

    protected $primaryKey = 'client_id'; // Définit la clé primaire pour le modèle, utilisée dans la base de données

    protected $fillable = [
        'last_name',   // Nom de famille du client
        'first_name',  // Prénom du client
        'email',       // Adresse email du client
        'phone',       // Numéro de téléphone du client
        'address',     // Adresse du client
        'type',        // Type de client, peut être utilisé pour distinguer différents types de clients
    ];

    /**
     * Définit la relation avec le modèle Order.
     * Un client peut avoir plusieurs commandes.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'client_id');
    }

    /**
     * Définit la relation avec le modèle Appointment.
     * Un client peut avoir plusieurs rendez-vous.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'client_id', 'client_id');
    }
}
