<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount');
            $table->smallInteger('cvv');
            $table->integer('expiryDate');
            $table->string('forwardingInst');
            $table->string('localDate');
            $table->string('localTime');
            $table->integer('merchantId');
            $table->integer('pan');
            $table->string('pin');
            $table->string('receivingInst');
            $table->integer('referenceNo')->index();
            $table->string('secret');
            $table->integer('systemTraceNo');
            $table->string('string');
            $table->tinyInteger('tranType');
            $table->string('transmissionDateAndTime');
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
        Schema::dropIfExists('i_payments');
    }
}
