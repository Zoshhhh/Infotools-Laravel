<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idCli');
            $table->string('nomCli');
            $table->string('prenomCli');
            $table->string('mailCli');
            $table->integer('telCli');
            $table->string('villeCli');
            $table->string('rueCli');
            $table->string('cpCli'); 
            $table->string('prospect');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
