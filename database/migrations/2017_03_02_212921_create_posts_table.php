<?php

use Illuminate\Support\Facades\Schema;
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
            $table->timestamps();

            $table->integer('user_id');

            $table->integer('reciever_id')->nullable();
            $table->string('reciever_type')->nullable();

            $table->string('name');

            $table->string('description');

            $table->string('status');

            $table->string('picture');

        });

        Schema::create('post_user', function (Blueprint $table) {

            //kandidati
            $table->integer('post_id');
            $table->integer('user_id');

            $table->primary(['post_id','user_id']);

        });


        Schema::create('post_user_belon', function (Blueprint $table) {

            //kandidati
            $table->integer('post_id');
            $table->integer('user_id');

            $table->primary(['post_id']);

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_user');
        Schema::dropIfExists('post_user_belon');
    }
}
