<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id('employer_id');
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->enum('role', ['Manager', 'Salesperson']);
            $table->integer('ad_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
