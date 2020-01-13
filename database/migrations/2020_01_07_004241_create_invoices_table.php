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
            $table->integer('ref')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('total')->nullable();
            $table->date('duedate')->nullable();
            $table->date('expedition_date')->nullable();
            $table->date('receipt_date')->nullable();
            $table->double('iva')->nullable();
            $table->integer('id_states')->unsigned()->nullable();
            $table->foreign('id_states')->references('id_states')->on('states');
            $table->integer('id_clients')->unsigned();
            $table->foreign('id_clients')->references('id_clients')->on('clients');
            $table->integer('id_companies')->unsigned();
            $table->foreign('id_companies')->references('id_companies')->on('companies');

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
