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
            $table->integer('acquiringInstIdCode')->nullable();
            $table->integer('additionalAmount')->nullable();
            $table->string('additionalData')->nullable();
            $table->double('amount');
            $table->integer('authorizationResponseId')->nullable();
            $table->smallInteger('currencyCode');
            $table->string('localDate');
            $table->string('localTime');
            $table->string('nameAndLocation')->nullable();
            $table->integer('referenceNo')->index();
            $table->string('responseCode');
            $table->integer('systemAuditNumber');
            $table->string('terminalId')->nullable();
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
