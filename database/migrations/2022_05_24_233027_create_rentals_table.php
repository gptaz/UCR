<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('userID')->references('id')->on('users')->onDelete('cascade');
            $table->integer('deviceID')->references('id')->on('devices')->onDelete('cascade');
            $table->double('insurance')->default('0');
            $table->double('rentalStatus')->default('0');
            $table->double('rentalDuration')->default('1');
            $table->timestamp('rentalDate');
            $table->integer('damageStatus')->default('0');
            $table->double('Penalty')->default('0');
            $table->double('totalPrice')->default('0');
            $table->double('deposit')->default('0');
            $table->string('details')->nullable();
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
        Schema::dropIfExists('rentals');
    }
};
