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
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->integer('outlet_id')->default(0);
            $table->string('display_as', 150)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('saas_id')->default(0);
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'ind_saas_brand');
            $table->unique(['saas_id', 'slug'], 'ind_saas_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};
