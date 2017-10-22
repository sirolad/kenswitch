<?php

use Kenswitch\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomFloat(),
        'cvv' => $faker->randomDigit,
        'expiryDate' => $faker->randomNumber(4),
        'forwardingInst' => $faker->word,
        'localDate' => $faker->randomNumber(4),
        'localTime' => $faker->randomNumber(4),
        'pan' => $faker->randomNumber(9),
        'pin' => $faker->randomNumber(5),
        'receivingInst' => $faker->randomNumber(4),
        'referenceNo' => $faker->word,
        'secret' => $faker->word,
        'systemTraceNo' => $faker->randomNumber(6),
        'token' => $faker->randomNumber(6),
        'tranType' => $faker->randomNumber(2),
        'transmissionDateAndTime' => $faker->randomNumber(8)
    ];
});
