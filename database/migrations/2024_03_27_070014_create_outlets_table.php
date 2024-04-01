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
        Schema::create('outlets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->char('name', 100)->default('');
            $table->char('email', 150)->default('');
            $table->char('phone', 150)->default('');
            $table->char('country', 100);
            $table->char('state', 100)->default('');
            $table->char('city', 100)->default('');
            $table->char('street', 100)->default('');
            $table->char('zip_code', 100)->default('');
            $table->char('wh_timezone', 50);
            $table->char('main_branch', 1)->default('N')->comment('bool(Y=Yes,N=No)');
            $table->char('allowed_ip')->default('');
            $table->char('status', 1)->default('A')->comment('bool(A=Active,I=Inactive)');
            $table->unsignedInteger('added_by')->default(0);
            $table->timestamps();

            $table->index(['saas_id', 'added_by'], 'saas_added_by');
            $table->unique(['saas_id', 'id'], 'saas_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlets');
    }
};
