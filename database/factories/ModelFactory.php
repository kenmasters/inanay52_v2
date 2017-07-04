<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// User Model Factory
$factory->define(App\User::class, function (Faker\Generator $faker) use ($factory) {
    $admin = $factory->raw(App\User::class, [], 'admin');
    $user = [
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'user_type' => null,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'code' => $faker->unique()->numerify('inanay###'),
        'dob' => $faker->dateTimeInInterval($startDate = '-25 years', $interval = '+1 year'),
        'address' => $faker->address,
        'phonum' => $faker->unique()->numerify('09#########'),
        'blood_type' => $faker->randomElement(['A+','A-','B+','B-', 'AB+', 'AB-', 'O+', 'O-'])
    ];
    return array_merge($admin, $user);

});

// User Model Factory (admin)
$factory->defineAs(App\User::class, 'admin', function ($faker) use ($factory) {
    $admin = [
        'user_type' => 'admin'
    ];

	return $admin;
});

// Appointment Model Factory
$factory->define(App\Appointment::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Prenatal Checkup',
        'user_id' => 1,
        'patient_id' => $faker->randomDigit,
        'schedule' => $faker->dateTime($max = 'now')
    ];
});
