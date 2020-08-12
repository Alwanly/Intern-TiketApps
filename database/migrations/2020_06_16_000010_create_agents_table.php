<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('agent_type_id');
            $table->string('code_agent')->unique();
            $table->unsignedBigInteger('bank_id');
            $table->integer('norekening');
            $table->string('name_rekening');
            $table->string('path_photoktp');
            $table->unsignedInteger('status_id');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank_masters');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status_masters');
            $table->foreign('agent_type_id')->references('id')->on('agent_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
