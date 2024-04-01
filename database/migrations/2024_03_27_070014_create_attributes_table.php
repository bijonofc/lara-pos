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
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->string('name', 100)->default('');
            $table->string('slug', 100)->default('');
            $table->char('is_archive', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->unsignedSmallInteger('sort_ord')->default(0);
            $table->unsignedInteger('created_by')->default(0);
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'ind_saas_attr');
            $table->index(['saas_id', 'slug'], 'ind_saas_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
};
