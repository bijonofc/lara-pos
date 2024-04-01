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
        Schema::create('product_serials', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('saas_id')->index('saas_id');
            $table->unsignedInteger('outlet_id');
            $table->string('serial_no', 128)->default('');
            $table->char('stock_status', 1)->default('A')->comment('radio(I=Instock,O=Out of stock)');
            $table->unsignedInteger('ref_val')->default(0);
            $table->timestamps();

            $table->unique(['saas_id', 'product_id', 'serial_no'], 'saas_product_serial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_serials');
    }
};
