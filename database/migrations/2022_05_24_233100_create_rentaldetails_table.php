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
        Schema::create('rentaldetails', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('rentalID')->references('id')->on('rentals')->onDelete('cascade');


            $table->integer('price');
            $table->integer('penalty')->default('0');

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
        Schema::dropIfExists('rentaldetails');
    }
};
