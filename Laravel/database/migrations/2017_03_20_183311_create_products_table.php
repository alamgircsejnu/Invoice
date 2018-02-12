<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productId', 255)->nullable();
            $table->string('productName', 255)->nullable();
            $table->string('productCategory', 255)->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('gst_price')->nullable();
            $table->string('supplier', 255)->nullable();
            $table->string('expenseType', 255)->nullable();
            $table->double('amount')->nullable();
            $table->double('gst_exp')->nullable();
            $table->double('profit')->nullable();
            $table->double('gst_payable')->nullable();
            $table->string('recProduct', 255)->nullable();
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
        Schema::dropIfExists('products');
    }
}
