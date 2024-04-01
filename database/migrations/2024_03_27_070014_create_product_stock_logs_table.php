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
        Schema::create('product_stock_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('outlet_id');
            $table->char('stock_type', 1)->default('C')->comment('radio(O=Outlet Wise Stock,C=Common Stock)');
            $table->unsignedInteger('user_id');
            $table->char('ref_type', 2)->default('OR')->comment('radio(PU=Purchase,OR=Order,TS=Transfer Send,TR=Transfer Receive,TC=Transfer Cancelled, TB=Transfer Back,OB=Order Back,PA=Product Add,PE=Product Edit)');
            $table->string('ref_val', 100)->default('');
            $table->char('type', 1)->default('O')->comment('radio(I=In,O=Out)');
            $table->char('msg')->default('');
            $table->integer('prev_stock')->default(0);
            $table->unsignedInteger('stock_val')->default(0);
            $table->char('ex1_param', 64)->default('')->comment('extra fields');
            $table->char('ex2_param', 64)->default('')->comment('extra fields');
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'outlet_id', 'product_id'], 'saas_outlet_product');
            $table->index(['saas_id', 'product_id'], 'saas_product_id');
            $table->index(['saas_id', 'user_id'], 'saas_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stock_logs');
    }
};
