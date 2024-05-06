<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idProduit');
            $table->string('typeProduit');
            $table->integer('prixProduit');
            $table->string('nomProduit');
            $table->string('pathImg');
            $table->string('descProduit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
