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
        Schema::create('user_balance_ledger', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id');
            $table->unsignedInteger('uesr_id');
            $table->decimal('credit', 12)->unsigned()->default(0);
            $table->decimal('debit', 12)->unsigned()->default(0);
            $table->decimal('interest', 5)->unsigned()->default(0)->comment('Only Percentage value will be added');
            $table->char('is_setteled', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->unsignedInteger('created_by')->default(0);
            $table->timestamps();

            $table->index(['saas_id', 'created_by'], 'saas_balance_created_by');
            $table->unique(['saas_id', 'uesr_id', 'id'], 'saas_user_due');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_balance_ledger');
    }
};
