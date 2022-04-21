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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('o_number')->nullable();
            $table->integer('status')->default(0);
            $table->integer('o_type')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->text('user_comment');
            $table->decimal('subtotal',12,2);
            $table->decimal('delivery',12,2);
            $table->decimal('total',12,2);
            $table->unsignedBigInteger('user_address_id');
            $table->integer('payment_method')->default(0);
            $table->text('payment_info');
            $table->dateTime('paid_at');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
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
};
