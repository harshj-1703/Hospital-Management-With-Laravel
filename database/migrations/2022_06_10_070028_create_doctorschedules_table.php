<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorschedules', function (Blueprint $table) {
            $table->id();
            $table->enum('dayid',["0","1","2","3","4","5","6"]);
            $table->time('starttime');
            $table->time('endtime');
            $table->unsignedBigInteger('dr_id');
            $table->foreign('dr_id')->references('id')->on('doctors');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('doctorschedules');
    }
}
