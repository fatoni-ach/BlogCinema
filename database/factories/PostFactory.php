<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'judul'         => $faker->sentence(10),
        'slug'          => \Str::slug($faker->sentence(10)), 
        'posted_by'     => $faker->name,
        'deskripsi'     => $faker->paragraph(10),
        'link_video'    => $faker->sentence(),
        'link_download' => $faker->sentence(),
        'link_gambar'   => $faker->sentence(),
        'genre'         => $faker->sentence(),
    ];
});
