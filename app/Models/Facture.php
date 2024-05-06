<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $primaryKey = 'idFacture'; // Assurez-vous que cela correspond au nom de la colonne dans votre base de données

    public function client()
    {
        return $this->belongsTo(Client::class, 'idCli');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'facture_produit', 'idFacture', 'idProduit')
                    ->withPivot('quantite', 'prix');
    }

}
