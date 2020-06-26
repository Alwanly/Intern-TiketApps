<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('method_id');
            $table->string('bank_code')->unique();
            $table->string('bank_name');
            $table->unsignedInteger('status_id');
            $table->timestamps();

            $table->foreign('method_id')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('bank_masters');
    }
}
