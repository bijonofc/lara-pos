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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->char('first_name', 150)->default('');
            $table->char('last_name', 150)->default('');
            $table->string('username', 100)->default('');
            $table->string('email', 100)->default('');
            $table->string('pass');
            $table->unsignedInteger('role_id')->default(0);
            $table->string('address', 150)->default('');
            $table->string('city', 150)->default('');
            $table->char('state_code', 5)->default('');
            $table->char('country_code', 5)->default('');
            $table->string('zip_code', 10)->default('');
            $table->timestamps();
            $table->unique(['saas_id', 'email', 'username'], 'saas_email_username');
            $table->index(['saas_id', 'role_id'], 'saas_role');
            $table->unique(['saas_id', 'id'], 'saas_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
