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
        Schema::create('devices', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('brand');
            $table->string('image');
            $table->integer('quantity');
            $table->double('rentalPrice');
            $table->string('OS');
            $table->string('displaySize');
            $table->string('RAM');
            $table->integer('USBPort');
            $table->integer('HDMIPort');
            $table->string('description');
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
        Schema::dropIfExists('devices');
    }
};
