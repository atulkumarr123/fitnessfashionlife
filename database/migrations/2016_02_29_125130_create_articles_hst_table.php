<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesHstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_hst', function(Blueprint $table) {
            $table->integer('id');
            $table->string('title');
            $table->string('description');
            $table->longText('body');
            $table->timestamps();
            $table->timestamp("published_at");
            $table->string('img_name')->nullable();
            $table->string('category')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('isPublishedByAdmin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("articles_hst");
    }
}
