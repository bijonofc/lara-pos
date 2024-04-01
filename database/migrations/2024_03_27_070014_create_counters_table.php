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
        Schema::create('counters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id');
            $table->char('name', 100)->default('');
            $table->unsignedInteger('counter_number')->nullable()->default(0);
            $table->unsignedInteger('outlet_id');
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'outlet_id'], 'saas_outlet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
};
