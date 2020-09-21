<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('buy_id')->unsigned();
            $table->string('code');
            $table->string('service_code');
            $table->string('name');
            $table->string('supplier');
            $table->integer('quantity');
            $table->float('unit_price');

            $table->timestamps();

            $table->foreign('buy_id')->references('id')->on('buys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_items');
    }
}
