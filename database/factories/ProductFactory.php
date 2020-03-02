<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'price'=>$faker->numberBetween(100,1000),
        'details'=>$faker->paragraph,
        'quantity'=>$faker->randomDigit,
        'image'=>$faker->imageUrl($width = 640, $height = 480)
    ];
});
