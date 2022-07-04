<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
            $table->string('username',50);
            $table->string('email',50);
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->string('phoneno',15);
            $table->string('password');
            $table->enum('gender',["M","F","O"])->nullable();
            $table->date('dob')->nullable();
            $table->string('profileimage',150)->nullable();
            $table->text('biography')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('pincode',20)->nullable();
            $table->string('services')->nullable();
            $table->string('specialization')->nullable();
            $table->BigInteger('general_cons_price',7)->nullable();
            $table->BigInteger('videocallprice',7)->nullable();
            $table->BigInteger('voicecallprice',7)->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('doctors');
    }
}
