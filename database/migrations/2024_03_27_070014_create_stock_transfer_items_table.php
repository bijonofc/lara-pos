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
        Schema::create('stock_transfer_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('product_id');
            $table->decimal('product_qty')->unsigned();
            $table->unsignedInteger('transfer_id');

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'product_id'], 'saas_product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_transfer_items');
    }
};
