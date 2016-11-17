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
            $table->increments('id');
            $table->string('status')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->timestamp('order_start')->nullable();
            $table->integer('action_id')->nullable();
            $table->string('price')->nullable();
            $table->string('packer')->nullable();
            $table->integer('courier_id')->nullable();
            $table->string('delivery')->nullable();
            $table->string('profit')->nullable();
            $table->string('size')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->text('wish')->nullable();
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
