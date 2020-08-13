<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('bank_id');
            $table->integer('norekening');
            $table->string('rekening_name');
            $table->string('path_photoproof');
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('bank_id')->references('id')->on('bank_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_confirms');
    }
}
