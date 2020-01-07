<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->increments('id_invoice_products');
            $table->integer('quantity');
            $table->double('unit_value');
            $table->double('total_value');
            $table->integer('id_invoices')->unsigned();
            $table->foreign('id_invoices')->references('id_invoices')->on('invoices');
            $table->integer('id_products')->unsigned();
            $table->foreign('id_products')->references('id_products')->on('products');
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
        Schema::dropIfExists('invoice_products');
    }
}
