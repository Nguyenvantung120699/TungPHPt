<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// $factory->define(\App\Category::class,function(Faker $faker){
//     return[
//         'category_name' =>$faker->unique()->name
//     ];
// });

// $factory->define(\App\Products::class,function(Faker $faker){
//     return[
//         'product_name' =>$faker->unique()->name,
//         'product_desc' =>$faker->title,
//         'thumbnail' =>$faker->imageUrl(),
//         'gallery' =>$faker->imageUrl().",".$faker->imageUrl(),
//         'price' =>random_int(1,1000),
//         'quantity' =>random_int(1,100),
//         'category_id' =>random_int(1,3),
//         'brand_id' =>random_int(1,5),
//     ];
// });

// $factory->define(\App\Brand::class,function(Faker $faker){
//     return[
//          'brand_name' =>$faker->unique()->name
//      ];
// });

$factory->define(\App\Student::class,function(Faker $faker){
    return[
        'student_name' =>$faker->unique()->student_name,
        'age' =>$faker->unique()->age,
        'telephone' =>$faker->unique()->telephone,
        'classRoom' =>$faker->unique()->classRoom,
        'total_mark' =>$faker->unique()->total_mark,
    ];
});

