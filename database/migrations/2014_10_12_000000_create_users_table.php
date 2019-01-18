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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->date('date_birthday')->nullable();
            $table->string('password');
            $table->integer('rating')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            // relations genres
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')
                  ->references('id')->on('genres')
                  ->onDelete('cascade')->onUpdate('cascade');

            // relations states
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                  ->references('id')->on('states')
                  ->onDelete('cascade')->onUpdate('cascade');

            // relations towns
            $table->integer('town_id')->unsigned();
            $table->foreign('town_id')
                  ->references('id')->on('towns')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->softDeletes();
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
