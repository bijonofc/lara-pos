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
        Schema::create('cash_drawer_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('drawer_id')->default(0);
            $table->unsignedInteger('order_id')->default(0);
            $table->char('payment_type', 1)->default('');
            $table->decimal('amount', 10)->unsigned()->default(0);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->index(['saas_id', 'drawer_id'], 'saas_drawer');
            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'order_id'], 'saas_order');
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
        Schema::dropIfExists('cash_drawer_types');
    }
};
