<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id('idFacture');
            $table->date('dateFact');
            $table->foreignId('idCli')->constrained('clients', 'idCli')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
};
