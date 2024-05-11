<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->foreignId('client_id')->constrained('clients', 'client_id')->nullable();
            $table->foreignId('salesperson_id')->constrained('employers', 'employer_id');
            $table->dateTime('date_time');
            $table->string('location', 255);
            $table->enum('status', ['Planned', 'Realized', 'Canceled']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
