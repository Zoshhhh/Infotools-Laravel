<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    // Si votre table a un nom différent de 'produits', spécifiez-le ici
    protected $table = 'produits';

    // Spécifiez la clé primaire personnalisée
    protected $primaryKey = 'idProduit';

    // Si votre clé primaire n'est pas un nombre entier ou si vous n'utilisez pas d'auto-incrémentation
    protected $keyType = 'string';
    public $incrementing = false;

    // ... (le reste de votre modèle)
}

