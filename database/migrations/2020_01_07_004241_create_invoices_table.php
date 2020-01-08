<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id_invoices');
            $table->string('title');
            $table->double('subtotal');
            $table->double('total');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->date('duedate');
            $table->date('expedition_date');
            $table->date('receipt_date');
            $table->double('iva');
            $table->integer('id_states')->unsigned();
            $table->foreign('id_states')->references('id_states')->on('states');
            $table->integer('id_clients')->unsigned();
            $table->foreign('id_clients')->references('id_clients')->on('clients');

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
        Schema::dropIfExists('invoices');
    }
}
