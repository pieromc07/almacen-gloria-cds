<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('lot_number');
            $table->float('lot_price');
            $table->integer('quantity');
            $table->string('location');
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
        Schema::dropIfExists('storage_details');
    }
}
