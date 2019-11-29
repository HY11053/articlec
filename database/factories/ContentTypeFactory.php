<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArticleType;
use Faker\Generator as Faker;

$factory->define(ArticleType::class, function (Faker $faker) {
    return [
        'content_type' => '加盟费用',
    ];
});
