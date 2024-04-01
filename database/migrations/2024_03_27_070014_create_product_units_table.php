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
        Schema::create('product_units', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('title', 100);
            $table->char('display_as', 100);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('saas_id')->default(0);
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_unit_id');
            $table->index(['saas_id', 'title'], 'saas_unit_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_units');
    }
};
