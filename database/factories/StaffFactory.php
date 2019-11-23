<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'service_name' => $faker->word,
        'phone_number'=>$faker->phoneNumber,
        'address' => $faker->streetName            

    ];
});
