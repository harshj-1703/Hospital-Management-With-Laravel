<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dr_id');
            $table->foreign('dr_id')->references('id')->on('doctors');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->date('bookingdate');
            $table->time('bookingtime');
            $table->time('bookingendtime')->nullable();
            $table->string('razorpayid');
            // $table->string('billno',50);
            $table->Integer('amountpaid');
            $table->enum('status',["1","2","0"])->default("2"); //1=> confirmed , 2=>pending , 3=>cancaled
            $table->enum('appointmentstatus',["1","0"])->default("0");
            $table->enum('paymentstatus',["1","0"])->default("1");
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
        Schema::dropIfExists('appointments');
    }
}
