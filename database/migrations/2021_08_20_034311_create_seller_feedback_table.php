<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_feedback', function (Blueprint $table) {
            $table->integer('feedbackID');
            $table->string('seller')->references('username')->on('seller_infos');
            $table->string('user')->references('username')->on('buyer_users');
            $table->string('Feedback');
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
        Schema::dropIfExists('seller_feedback');
    }
}
