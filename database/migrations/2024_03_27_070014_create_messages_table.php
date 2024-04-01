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
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->char('title')->default('');
            $table->text('msg');
            $table->char('msg_type', 1)->default('M')->comment('radio(D=Deny,M=Message)');
            $table->char('msg_panel', 1)->default('A')->comment('radio(A=All,C=Cashier,K=Kitchen,W=Waiter)');
            $table->char('status', 1)->default('A')->comment('radio(A=Active,I=Inactive)');
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
        Schema::dropIfExists('messages');
    }
};
