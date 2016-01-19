<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_details', function (Blueprint $table) {
//            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('counter');
            $table->string('img_name');
            $table->longText('body');
            $table->timestamps();
        });

        Schema::table('article_details', function(Blueprint $table)
        {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("article_details");
    }
}
