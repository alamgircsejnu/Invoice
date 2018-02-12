<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerName', 255)->nullable();
            $table->string('streetAddress', 510)->nullable();
            $table->string('streetAddress2', 510)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zipCode', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('phoneNumber', 255)->nullable();
            $table->string('faxNumber', 255)->nullable();
            $table->string('mobileNumber', 255)->nullable();
            $table->string('emailAddress', 255)->nullable();
            $table->string('webAddress', 255)->nullable();
            $table->string('vatId', 255)->nullable();
            $table->string('taxesCode', 255)->nullable();
            $table->string('crmId', 255)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
