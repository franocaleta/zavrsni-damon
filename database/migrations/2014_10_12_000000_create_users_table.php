<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email')->unique();

            $table->string('name');
            $table->string('lastname');

            $table->string('profilePic')->nullable();

            $table->string('about_me')->nullable();

            $table->string('password');

            $table->string('country');
            $table->string('phone');
            $table->string('city');
            $table->string('address');
            $table->integer('zipcode');

            $table->float('rating');

            $table->boolean('isAdmin');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
