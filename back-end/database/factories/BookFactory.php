<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->text(50),
        'cover' => 'https://picsum.photos/500/300?image=' . $faker->numberBetween(10,1000),
        'short_desc' => $faker->text,
        'author' => $faker->firstName . ' '. $faker->lastName,
        'publisher' => $faker->company,
        'release_year' => $faker->year()
    ];
});
