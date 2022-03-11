<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('brand');
            $table->string('model');
            $table->string('position');
            $table->string('unit');
            $table->unsignedFloat('piecesInUnit')->default(1);
            $table->unsignedFloat('gUnitPrice');
            $table->unsignedFloat('dUnitPrice');
            $table->unsignedFloat('gPiecePrice');
            $table->unsignedFloat('dPiecePrice');
            $table->unsignedFloat('initUnitQ');
            $table->unsignedFloat('initPieceQ');
            $table->unsignedFloat('quantityAlert');
            $table->date('expDate')->nullable();
            $table->unsignedFloat('oldgUnitPrice');
            $table->unsignedFloat('olddUnitPrice');
            $table->unsignedFloat('oldgPiecePrice');
            $table->unsignedFloat('olddPiecePrice');
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
        Schema::dropIfExists('products');
    }
}
