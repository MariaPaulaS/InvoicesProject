<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id_clients');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('id_card');
            $table->string('number_phone');
            $table->string('address');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}
