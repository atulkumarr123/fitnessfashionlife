<?php

use Illuminate\Database\Seeder;
use App\ArticleDetail;
use App\Article;

class ArticleDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $articleIds = Article::lists('id')->all();
        foreach (range(1, 30) as $index) {
            ArticleDetail::create([
                'article_id' => $faker->randomElement($articleIds),
                'heading' => $faker->sentence,
                'counter' => $index,
                'body' => $faker->paragraph,
                'img_name' =>  $faker->word,
            ]);
        }
    }
}
