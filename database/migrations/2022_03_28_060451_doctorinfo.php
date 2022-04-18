<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doctorinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('doctorInfo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameNe');
            $table->string('speciality');
            $table->string('specialityNe');
            $table->string('ratings');
            $table->string('ratingSNe');
            $table->string('experience');
            $table->string('experienceNe');
            $table->string('about');
            $table->string('aboutNe');
            $table->string('appointmentTime');
            $table->string('appointmentTimeNe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
