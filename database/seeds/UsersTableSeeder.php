<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table entry 
        User::truncate();

        // Using Model Factory

        // Create 1 administrator
        factory(User::class, 'admin', 1)->create([
            'username' => 'admin',
        	'email' => 'inanay.mamaasin@gmail.com',
        	'password' => bcrypt('123456'),
        ]);

        // Create 15 normal users
        // factory(User::class, 50)->create();

    }
}
