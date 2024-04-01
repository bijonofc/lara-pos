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
        Schema::create('attr_terms', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->default('');
            $table->string('params')->nullable();
            $table->unsignedInteger('created_by')->default(0);
            $table->unsignedInteger('attribute_id')->default(0);
            $table->unsignedInteger('saas_id')->default(0)->index('ind_saas_id');
            $table->timestamps();

            $table->index(['saas_id', 'attribute_id'], 'ind_saas_attr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attr_terms');
    }
};
