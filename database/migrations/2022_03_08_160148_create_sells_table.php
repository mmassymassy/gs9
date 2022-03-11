<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bonId')->references('id')->on('bons');
            $table->foreignId('clientId')->references('id')->on('clients');
            $table->foreignId('productId')->references('id')->on('products');
            $table->unsignedFloat('unitQuantity');
            $table->unsignedFloat('pieceQuantity');
            $table->unsignedFloat('unitPrice');
            $table->unsignedFloat('piecePrice');
            $table->unsignedFloat('totalSell');
            $table->unsignedFloat('totalPaid');
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
        Schema::dropIfExists('sells');
    }
}
