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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('product_id');
            $table->decimal('purchase_cost', 10)->unsigned()->default(0);
            $table->decimal('prev_purchase_cost', 10)->unsigned()->default(0);
            $table->decimal('stock_quantity')->unsigned()->default(0);
            $table->char('product_name')->default('');
            $table->decimal('in_stock', 10)->unsigned()->default(0);
            $table->char('bar_code')->default('');
            $table->decimal('total_cost', 10)->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('purchase_items');
    }
};
