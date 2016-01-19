<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 10) as $index) {
            Article::create([
                'title' => $faker->title,
                'body' => $faker->paragraph,
                'description' =>  $faker->sentence,
                'published_at' => $faker->date(),
            ]);
        }

    }
}
