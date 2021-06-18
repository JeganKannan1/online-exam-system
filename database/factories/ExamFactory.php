<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'user_id' => Str::random(10),
        'test_title' => Str::random(10),
        'score' => Str::random(10),
        'total' => '10',
        'skiped' => '2',
        'team_id' => Str::random(['2','3','4','5','10']),
        'role_id' => '3',
        'created_at' => $faker->dateTimeBetween('+1 month', '+1 year'),
        'updated_at' => $faker->dateTimeBetween('+1 month', '+1 year'),
    ];
});
