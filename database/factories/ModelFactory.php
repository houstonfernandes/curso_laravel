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

$factory->define(CodeCommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'endereco' => $faker->streetAddress,
        'numero'=> $faker->randomNumber(2),
        'bairro'=> $faker->name,
        'cidade'=> $faker->city,
        'uf' => $faker->countryISOAlpha3,
        'cep' => $faker->numerify('#####-###'),
    ];
});

$factory->define(CodeCommerce\Category::class, function (Faker\Generator $faker) {
    return [
            'name' => $faker->word,
            'description' => $faker->sentence
    ];
});

$factory->define(CodeCommerce\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomNumber(3),
        'recommend' => $faker->boolean(70),
        'featured' => $faker->boolean(),
        'category_id' => $faker->numberBetween(1,15)//criar primeiro as 15 categories
    ];
});
