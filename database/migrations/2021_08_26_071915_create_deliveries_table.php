<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentID')->references('id')->on('paiddetails');
            $table->integer('itemCode')->references('itemCode')->on('items');
            $table->string('buyerName')->references('username')->on('buyer_users');
            $table->boolean('packaging')->default(1);
            $table->boolean('shipped')->default(0);
            $table->date('shippedTime')->nullable();
            $table->boolean('arrivedToCurrier')->default(0);
            $table->date('arrivedToCurrierTime')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
