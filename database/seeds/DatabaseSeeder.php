<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded!');

        $this->call(AppointmentsTableSeeder::class);
        $this->command->info('Appointments table seeded!');

    }
}
