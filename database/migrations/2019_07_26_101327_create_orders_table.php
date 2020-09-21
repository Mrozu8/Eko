<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->string('worker');
            $table->string('nip')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->float('price')->nullable();
            $table->float('advance')->nullable();
            $table->string('customer_note')->nullable();
            $table->string('order_type');
            $table->string('order_note')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
