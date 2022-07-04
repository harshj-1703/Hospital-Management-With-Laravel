<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default("0")->nullabel();
            $table->unsignedBigInteger('dr_id');
            $table->foreign('dr_id')->references('id')->on('doctors');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->enum('star',["1","2","3","4","5"])->nullable();
            $table->string('title');
            $table->text('detail');
            $table->enum('recommended',["2","1","0"])->default("2");  //2->no say , 1->yes , 0->no
            $table->enum('status',["1","0"])->default("1");
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
        Schema::dropIfExists('reviews');
    }
}
