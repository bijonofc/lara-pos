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
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->char('name', 100)->default('');
            $table->char('email', 150)->default('');
            $table->char('contact_no', 150)->default('');
            $table->text('vendor_note')->nullable()->comment('textarea');
            $table->char('status', 1)->default('A')->comment('bool(A=Active,I=Inactive)');
            $table->unsignedInteger('added_by')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('vendors');
    }
};
