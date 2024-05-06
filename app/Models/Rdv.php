<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    // Définissez le nom de la table qui correspond à ce modèle
    protected $table = 'rdvs'; // Assurez-vous que c'est le bon nom de table

    // Définissez la clé primaire
    protected $primaryKey = 'idRdv'; // Remplacez 'idRdv' par le nom réel de la clé primaire

    // Spécifiez les colonnes qui peuvent être mass-assignées
    protected $fillable = ['dateRdv', 'idEmploye', 'idClient', 'created_at', 'updated_at'];

    // Relation avec l'utilisateur (employé)
    public function employe()
    {
        return $this->belongsTo(User::class, 'idEmploye');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient');
    }
}
