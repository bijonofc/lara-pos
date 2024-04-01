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
        Schema::create('product_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('saas_id');
            $table->unsignedInteger('product_id')->default(0);
            $table->string('meta_key', 100);
            $table->string('meta_value')->default('');

            $table->index(['saas_id', 'product_id'], 'ind_saas_product');
            $table->unique(['saas_id', 'product_id', 'meta_key'], 'ind_saas_product_meta_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_meta');
    }
};
