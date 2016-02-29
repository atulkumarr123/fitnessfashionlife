<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPublishedColumnToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function ($table) {
            $table->boolean('isPublished')->default(false);
        });
        Schema::table('articles_hst', function ($table) {
            $table->boolean('isPublished')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function ($table) {
            Schema::drop('isPublished');
        });
        Schema::table('articles_hst', function ($table) {
            Schema::drop('isPublished');
        });
    }
}
