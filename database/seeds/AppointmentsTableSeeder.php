<?php

use Illuminate\Database\Seeder;
use App\PxChart;
use App\Appointment;

class AppointmentsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table entry 
        PxChart::truncate();
        Appointment::truncate();

        // Using Model Factory and Faker
        // (new Faker\Generator)->seed('appointments_seed');
        // factory(App\Appointment::class, 10)->create();
        
        // Using Eloquent
        // Appointment::insert([
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	],
        // 	[
	       //      'name' => 'Prenatal Checkup',
	       //      'user_id' => 1,
	       //      'patient_id' => 2,
	       //      'schedule' => date('Y-m-d H:i:s'),
	       //      'created_at' => date('Y-m-d H:i:s'),         
        // 	]

        // ]);

    }
}
