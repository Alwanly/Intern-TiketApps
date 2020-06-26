<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmrohPacketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umroh_packet_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('packet_id');
            $table->date('manasik_date');
            $table->date('takeoff_date');
            $table->date('return_date');
            $table->string('duration');
            $table->integer('quota');
            $table->string('cashback');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('packet_id')->references('id')->on('umroh_packets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umroh_packet_details');
    }
}
