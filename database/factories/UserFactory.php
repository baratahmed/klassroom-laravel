<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'phone_number' => $faker->unique()->phoneNumber,
        'remember_token' => Str::random(10),
        'photo'  => $faker->imageUrl(),
        'email_verified' => 1,
        'email_verified_at' => now(),
        'email_verification_token' => '',
    ];
});


$factory->define(\App\Models\Category::class, function (Faker $faker) {
    $category = $faker->name;
    return [
        'name' => $category,
        'slug' => Str::slug($category),
    ];
});

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return[
    'user_id' => random_int(1,5),
    'category_id' => random_int(1,5),
    'title' => $faker->userName,
    'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis praesentium rerum quam, pariatur saepe inventore laudantium id mollitia consectetur! Ullam impedit obcaecati fuga adipisci velit doloremque vitae magnam quos quia.',
    'thumbnail_path' => $faker->imageUrl(),
    ];
});
