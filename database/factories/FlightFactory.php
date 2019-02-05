<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
	//$city = $faker->randomElement(['اصفهان', 'تهران','مشهد', 'شیراز', 'تبریز', 'اهواز']);
	//$airline = $faker->randomElement(['ماهان','آسمان','ایران ایر','کیش ایر','FlightToday','Emirate']);
    return [
        'from' 	=> $faker->randomElement(['اصفهان', 'تهران','مشهد', 'شیراز', 'تبریز', 'اهواز']),
        'to'	=> $faker->randomElement(['اصفهان', 'تهران','مشهد', 'شیراز', 'تبریز', 'اهواز']),
        'date'	=> $faker->dateTimeBetween('+1 month', '+3 month'),
        'airline'  => $faker->randomElement(['ماهان','آسمان','ایران ایر','کیش ایر','FlightToday','Emirate']),
        'capacity' => rand(1,75),
        'class'	=> $faker->randomElement(['bussines', 'economy','first']),        
        'status'=> $faker->randomElement(['0','1']),
    ];
});