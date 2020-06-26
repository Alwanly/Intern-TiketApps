<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_id');
            $table->integer('norekening');
            $table->string('rekening_name');
            $table->unsignedInteger('status_id');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank_masters');
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
        Schema::dropIfExists('rekening_masters');
    }
}
