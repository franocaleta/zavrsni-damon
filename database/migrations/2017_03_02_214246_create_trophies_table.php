<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrophiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trophies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            //photo
        });

        Schema::create('trophy_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('trophy_id');
            //photo
            $table->primary(['user_id','trophy_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trophies');
        Schema::dropIfExists('trophy_user');

    }
}
