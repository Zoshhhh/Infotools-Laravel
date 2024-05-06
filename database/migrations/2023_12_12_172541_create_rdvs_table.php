<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvsTable extends Migration
{
    public function up()
    {
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id('idRdv');
            $table->date('dateRdv');
            // Modifier la ligne ci-dessous pour faire référence à 'id' de la table 'users'
            $table->foreignId('idEmploye')->constrained('users')->onDelete('cascade');
            $table->foreignId('idClient')->constrained('clients', 'idCli')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rdvs');
    }
}
