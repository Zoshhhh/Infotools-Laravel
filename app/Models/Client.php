<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCli';

    protected $fillable = [
        'idCli', 'nomCli', 'prenomCli', 'mailCli', 'telCli', 
        'villeCli', 'rueCli', 'cpCli', 'prospect', 'created_at', 'updated_at'
    ];
}
