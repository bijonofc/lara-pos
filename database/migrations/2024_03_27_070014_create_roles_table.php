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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 100)->default('');
            $table->char('slug', 100)->default('');
            $table->char('description', 191)->default('');
            $table->char('display_as', 100)->default('');
            $table->unsignedInteger('saas_id');
            $table->char('is_admin', 1)->default('N');
            $table->char('status', 1)->default('A');
            $table->unsignedInteger('added_by')->default(0);
            $table->timestamps();

            $table->unique(['slug', 'id'], 'saas_role_id');
            $table->unique(['saas_id', 'slug'], 'saas_role_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
