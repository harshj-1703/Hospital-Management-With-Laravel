<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
            $table->string('username',50);
            $table->string('firstname',50)->nullable();
            $table->string('lastname',50)->nullable();
            $table->string('phoneno',15)->unique();
            $table->string('email',50)->unique();
            $table->string('password');
            $table->enum('gender',["M","F","O"])->nullable();
            $table->string('groupofblood',5)->nullable();
            $table->date('dob')->nullable();
            $table->string('profileimage',150)->nullable();
            $table->text('address')->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('pincode',20)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
