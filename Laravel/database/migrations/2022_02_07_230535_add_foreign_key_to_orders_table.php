<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->string('name');
            $table->decimal('discount');
            $table->decimal('price');
            $table->integer('quantity');
            $table->string('country');
            $table->string('city');
            $table->integer('house_no');
            $table->string('status')->default('waiting');
            $table->string('phone');
            $table->string('payment_method');
            $table->foreignId('customer_id')
            ->constrained('customers')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('cart_id')
            ->constrained('carts')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
