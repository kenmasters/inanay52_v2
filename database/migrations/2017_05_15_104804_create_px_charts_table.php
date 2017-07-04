<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePxChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('px_charts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id');
            $table->string('aog_in_months');
            $table->string('vaginal_bleeding')->nullable();
            $table->string('uti')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('hypertension')->nullable();
            $table->string('fever')->nullable();
            $table->string('pallor')->nullable();
            $table->string('abnormal_fundal_height')->nullable();
            $table->string('abnormal_presentation')->nullable();
            $table->string('missing_fetal_heartbeat')->nullable();
            $table->string('edema')->nullable();
            $table->string('vaginal_infection')->nullable();
            $table->string('lab_results')->nullable();
            $table->string('iron_folate')->nullable();
            $table->string('malaria_prophylaxis')->nullable();
            $table->string('breastfeed_intent')->nullable();
            $table->string('danger_signs')->nullable();
            $table->string('dental_checkup')->nullable();
            $table->string('eplans_pod')->nullable();
            $table->string('risk')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('px_charts');
    }
}
