<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdColumnToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function ($table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('articles_hst', function ($table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function ($table) {//have to work on this foreign keys should also be dropped before dropping the actual column take the reference from nationpolls code (Model Name: AddGeoLocsIdToPollsTable)
            $table->dropColumn('category_id');
        });
        Schema::table('articles_hst', function ($table) {
            $table->dropColumn('category_id');
        });
    }
}
