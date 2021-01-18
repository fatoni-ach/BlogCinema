<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LinkDownload;
use Faker\Generator as Faker;

$factory->define(LinkDownload::class, function (Faker $faker) {
    return [
        'name'  => $faker->sentence(1),
        'slug'  => \Str::slug($faker->sentence(10)),
        'link_1'=> $faker->sentences(5),
        'link_2'=> $faker->sentences(5),
        'link_3'=> $faker->sentences(5),
        // 'post_id'=> rand(1,10)
        'post_id'=> rand(21,30)
    ];
});
