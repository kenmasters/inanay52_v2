<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('user_type')->nullable();
            $table->boolean('active')->default(true);
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable()->comment('date of birth');
            $table->string('phonum')->nullable();
            $table->string('fam_serial_num')->nullable();
            $table->date('lmp')->nullable()->comment('last menstrual period');
            $table->date('edc')->nullable()->comment('estimated date of conception');
            $table->string('blood_type')->nullable();
            $table->integer('prev_pregnancy')->nullable()->comment('number of previous pregnancy');
            $table->string('prev_caesarian')->nullable()->comment('previous ceasarian section');
            $table->string('rpl')->nullable()->comment('recurrent pregnancy loss');
            $table->string('stillbirth')->nullable();
            $table->string('pph')->nullable()->comment('postpartum hemorrhage');
            $table->string('tubercolosis')->nullable();
            $table->string('heart_disease')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('bronchial_asthma')->nullable();
            $table->string('goiter')->nullable();
            $table->string('iodine_deficiency')->nullable()->comment('iodine supplementation in high risk areas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
