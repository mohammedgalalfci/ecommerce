<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignId('customer_id')
            ->constrained('customers')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('product_id')
            ->constrained('products')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            //
        });
    }
}
