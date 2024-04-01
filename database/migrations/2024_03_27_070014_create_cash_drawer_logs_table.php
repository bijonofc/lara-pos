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
        Schema::create('cash_drawer_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('drawer_id')->default(0);
            $table->char('ref_id', 50)->default('');
            $table->char('note')->default('');
            $table->decimal('pre_balance', 10)->unsigned()->default(0);
            $table->decimal('amount', 10)->unsigned()->default(0);
            $table->unsignedInteger('user_id')->default(0);
            $table->char('log_type', 1)->default('C')->comment('radio(D=Debit,C=Credit)');
            $table->char('ref_type', 1)->default('O')->comment('radio(O=Order,C=Close,W=Withdraw)');
            $table->decimal('closing_balance', 10)->unsigned()->nullable()->default(0);
            $table->timestamps();

            $table->index(['saas_id', 'drawer_id'], 'saas_drawer');
            $table->unique(['saas_id', 'id'], 'saas_id');
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
        Schema::dropIfExists('cash_drawer_logs');
    }
};
