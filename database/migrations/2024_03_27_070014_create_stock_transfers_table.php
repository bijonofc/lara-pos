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
        Schema::create('stock_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('transfer_from')->default(0)->comment('Transfer from outlet');
            $table->unsignedInteger('transfer_to')->default(0)->comment('Transfer to outlet');
            $table->char('transfer_note')->default('');
            $table->char('receive_note')->default('');
            $table->unsignedInteger('transfer_by')->default(0)->comment('Transfering user');
            $table->unsignedInteger('received_by')->default(0)->comment('Receiving user');
            $table->char('transfer_status', 1)->default('P')->comment('radio(P=Pending,R=Received,D=Declined,C=Cancelled,E=Draft,A=Accepted)');
            $table->timestamp('receive_date')->nullable();
            $table->unsignedInteger('accepted_by')->default(0)->comment('Receiving user');
            $table->timestamp('accepted_date')->nullable();
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'received_by'], 'saas_reeived_by');
            $table->index(['saas_id', 'transfer_by'], 'saas_transfer_by');
            $table->index(['saas_id', 'transfer_from'], 'saas_transfer_from');
            $table->index(['saas_id', 'transfer_to'], 'saas_transfer_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_transfers');
    }
};
