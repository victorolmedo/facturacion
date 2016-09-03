<?php

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
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->boolean('cms')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(array('name' => 'Gino Matteucci', 'email'=> utf8_encode('ginomatteucci@gmail.com'),'password'=> bcrypt('123') ));
        DB::table('users')->insert(array('name' => 'Victor Olmedo', 'email'=> utf8_encode('victorolmedo@gmail.com'),'password'=> bcrypt('123') ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
