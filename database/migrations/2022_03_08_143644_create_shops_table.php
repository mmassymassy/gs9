<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->date('shopDate');
            $table->foreignId('providerId')->references('id')->on('providers');
            $table->foreignId('productId')->references('id')->on('products');
            $table->unsignedFloat('quantity');
            $table->unsignedFloat('totalPaid');
            $table->unsignedFloat('totalUnpaid');
            $table->boolean('canceled')->default(0);
            $table->text('info');
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
        Schema::dropIfExists('shops');
    }
}
