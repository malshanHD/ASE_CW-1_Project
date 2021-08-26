<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiddetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiddetails', function (Blueprint $table) {
            $table->id();
            $table->integer('itemCode')->references('itemCode')->on('items');
            $table->string('buyusername')->references('buyusername')->on('buyer_users');
            $table->string('sellusername')->references('sellusername')->on('seller_infos');
            $table->integer('value');
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
        Schema::dropIfExists('paiddetails');
    }
}
