<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();
            $table->string('email',60)->nullable();
            $table->smallInteger('city');
            $table->smallInteger('mood');
            $table->text('content')->nullable();
            $table->string('slag')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps('published_at');
        });


        Schema::table('posts', function(Blueprint $table)
        {
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('mood')->references('id')->on('moods');
        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
