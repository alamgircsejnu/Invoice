<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('invoiceNo', 255)->nullable();
            $table->string('customer', 255)->nullable();
            $table->date('date')->nullable();
            $table->date('dueDate')->nullable();
            $table->string('status',255)->nullable();
            $table->string('paymentMethod',255)->nullable();
            $table->string('pdfPassword', 255)->nullable();
            $table->float('invoice_discount_amount')->nullable();
            $table->float('invoice_discount_percent')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
