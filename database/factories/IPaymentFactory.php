<?php

use Kenswitch\IPayment;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(IPayment::class, function (Faker $faker) {

    return [
        'acquiringInstIdCode' => $faker->numberBetween(50000, 100000),
        'additionalAmount' => $faker->randomDigit,
        'additionalData' => $faker->word,
        'amount' => $faker->randomFloat(),
        'authorizationResponseId' => $faker->randomNumber(4),
        'currencyCode' => $faker->randomNumber(3),
        'localDate' => $faker->randomNumber(4),
        'localTime' => $faker->randomNumber(4),
        'nameAndLocation' => $faker->name(),
        'referenceNo' => $faker->randomNumber(5),
        'responseCode' => $faker->randomNumber(4),
        'systemAuditNumber' => $faker->randomNumber(7),
        'terminalId' => $faker->randomNumber(6),
        'tranType' => $faker->randomNumber(2),
        'transmissionDateAndTime' => $faker->randomNumber(8)
    ];
});
