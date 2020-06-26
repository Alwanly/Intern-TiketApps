<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmrohPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umroh_packets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('packet_title');
            $table->string('packet_desc');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('airline_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('airline_id')->references('id')->on('airlines');
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
        Schema::dropIfExists('umroh_packets');
    }
}
