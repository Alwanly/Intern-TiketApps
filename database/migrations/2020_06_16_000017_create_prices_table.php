<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('packet_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();

            $table->foreign('packet_id')->references('id')->on('umroh_packets');
            $table->foreign('room_id')->references('id')->on('room_types');
            $table->foreign('status_id')->references('id')->on('status_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
