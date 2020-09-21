<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('repair_number');
            $table->string('worker');
            $table->string('nip')->nullable();
            $table->string('customer');
            $table->string('address');
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->text('customer_note')->nullable();
            $table->string('model')->nullable();
            $table->string('code_first')->nullable();
            $table->string('code_second')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('supplier')->nullable();
            $table->string('warranty')->nullable();
            $table->string('sale_date')->nullable();
            $table->text('damage_note');
            $table->text('other_note')->nullable();
            $table->string('repair_date');
            $table->string('status')->default(1);
            $table->float('cost')->nullable();
            $table->float('delivery_cost')->nullable();
            $table->string('success')->nullable();
            $table->text('note_end')->nullable();
            $table->float('total_cost')->nullable();
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
        Schema::dropIfExists('repairs');
    }
}
