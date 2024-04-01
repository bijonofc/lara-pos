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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('outlet_id')->default(0);
            $table->unsignedInteger('ref_id')->default(0);
            $table->decimal('price', 11)->unsigned()->default(0);
            $table->decimal('regular_price', 11)->unsigned()->default(0);
            $table->decimal('purchase_price', 11)->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
};
