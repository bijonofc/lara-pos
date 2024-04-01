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
        Schema::create('cash_drawers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('counter_id')->default(0);
            $table->unsignedInteger('outlet_id')->default(0);
            $table->unsignedInteger('opened_by')->nullable()->default(0);
            $table->unsignedInteger('closed_by')->nullable()->default(0);
            $table->char('status', 1)->default('O')->comment('radio(O=Open,C=Close)');
            $table->decimal('opening_balance', 11)->unsigned()->default(0);
            $table->decimal('closing_balance', 11)->unsigned()->default(0);
            $table->timestamp('closing_time')->useCurrent();
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'outlet_id', 'counter_id'], 'saas_outlet_counter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_drawers');
    }
};
