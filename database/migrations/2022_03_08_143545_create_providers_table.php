<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('info')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedFloat('debtAlert')->default(20000);
            $table->unsignedFloat('totalPaid')->dafault(0);
            $table->unsignedFloat('totalUnpaid')->dafault(0);
            $table->boolean('deleted')->dafault(0);
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
        Schema::dropIfExists('providers');
    }
}
