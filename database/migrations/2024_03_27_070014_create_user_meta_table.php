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
        Schema::create('user_meta', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('saas_id')->default(0);
            $table->string('meta_key', 100)->default('');
            $table->string('meta_value')->default('');

            $table->index(['saas_id', 'user_id'], 'saas_user');
            $table->unique(['saas_id', 'user_id', 'meta_key'], 'saas_user_meta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_meta');
    }
};
