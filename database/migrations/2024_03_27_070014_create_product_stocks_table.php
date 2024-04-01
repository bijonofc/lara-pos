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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('outlet_id')->default(0);
            $table->unsignedInteger('product_id')->default(0);
            $table->decimal('stock_quantity', 10)->default(0);
            $table->char('stock_status', 1)->nullable()->default('I')->comment('radio(I=Instock,O=Out of Stock)');
            $table->char('backorders', 1)->nullable()->default('N')->comment('radio(Y=Yes,N=No)');
            $table->decimal('low_stock_amount', 5)->unsigned()->nullable();
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->unique(['saas_id', 'outlet_id', 'product_id'], 'saas_outlet_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
};
