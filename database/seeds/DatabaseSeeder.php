<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

      factory(App\Researcher::class,5)->create();
      factory(App\Searcher::class,5)->create();
      factory(App\Researchpaper::class,5)->create();
      factory(App\Survey::class,5)->create();



    }
}
