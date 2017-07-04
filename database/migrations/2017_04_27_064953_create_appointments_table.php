<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'appointments', 
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('patient_id');
                $table->string('name')->default('Prenatal Checkup');
                $table->dateTime('schedule')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->boolean('completed')->default(false);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
