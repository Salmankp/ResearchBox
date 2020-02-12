<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Researcher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'dob' =>$faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y/m/d'),
        'phone' => $faker->phoneNumber,
        'zip_code' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'organization' => $faker->word,
        'experience' => '5',
        'category' => 'ISLAMIC',
        'position' => $faker->word,
        'area' => $faker->word,
        'major' => $faker->word,
        'type' => 'International',
        'description' => 'Hey, I am a researchers that undertakes research projects to investigate a number of social issues and then report their findings. A social researcher will use a variety of methods to gather ',
        'profile_pic' => 'default.png',
        'email_verified_at' => now(),
        'remember_token' => str_random(10),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Searcher::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'profile_pic' =>'default.png',
        'remember_token' => str_random(10),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Researchpaper::class, function (Faker $faker) {
    return [
        'researcher_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'designation' =>'Manager',
        'article_name' => $faker->word,
        'isbn' => $faker->unique()->randomNumber,
        'article_title' => $faker->word,
        'service' => 'jr',
        'journal_name' => $faker->word,
        'journal_publisher' => $faker->word,
        'journal_publish_date' => Carbon::now()->format('Y-m-d H:i:s'),
        'conference_name' => $faker->word,
        'conference_date' => Carbon::now()->format('Y-m-d H:i:s'),
        'conference_location' => $faker->word,
        'conference_supervisor' => $faker->word,
        'institution' => $faker->word,
        'type' => 'International',
        'institute' => $faker->word,
        'payment_type' => 'free',
        'price' => '5$',
        'file' => 'E:\xampp\tmp\php4158.tmp',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});


$factory->define(App\Survey::class, function (Faker $faker) {
    return [

        'researcher_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'designation' =>'Manager',
        'survey_name' => $faker->word,
        'type' =>'International',
        'file' =>'E:\xampp\tmp\php4158.tmp',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});
