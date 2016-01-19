<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $seederClasses = [
        'ArticlesTableSeeder',
        'ArticleDetailsTableSeeder'
    ];

    protected $tabs = [
        'Articles',
        'Article_Details'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->cleanDB();
//        $this->call(ArticlesTableSeeder::class);
//        $this->call(ArticleDetailsTableSeeder::class);
        foreach ($this->seederClasses as $seeder) {
            $this->call($seeder);
        }
        Model::reguard();
    }


    public function cleanDB()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($this->tabs as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}