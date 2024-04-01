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
        Schema::create('role_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->default(0);
            $table->unsignedInteger('saas_id')->default(0);
            $table->string('resource', 100);
            $table->string('role_access', 1)->default('N');

            $table->index(['saas_id', 'role_id'], 'saas_role');
            $table->unique(['saas_id', 'role_id', 'resource'], 'saas_role_resource');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_accesses');
    }
};
