<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleDetailsHstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_details_hst', function (Blueprint $table) {
//            $table->engine = "InnoDB";
            $table->integer('id');
            $table->integer('article_id')->unsigned();
            $table->integer('counter');
            $table->string('img_name');
            $table->longText('body');
            $table->string('heading')->nullable();
            $table->timestamps();
        });

//        Schema::table('article_details_hst', function(Blueprint $table)
//        {
//            $table->foreign('article_id')->references('id')->on('articles_hst')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("article_details_hst");
    }
}
