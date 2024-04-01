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
        Schema::create('active_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('saas_id');
            $table->integer('package_id');
            $table->string('package_slug', 50)->default('');
            $table->string('pkg_type', 1)->default('P')->comment('Radio(P=Package,A=Addon)');
            $table->string('billing_cycle', 1)->default('M')->comment('Radio(L=Life Time,M=Monthly,Y=Yearly,D=Day Period)');
            $table->integer('day_of_bill')->nullable();
            $table->dateTime('next_bill_date')->nullable();
            $table->dateTime('prev_bill_date')->nullable();
            $table->string('is_free', 1)->default('N')->comment('Radio(Y=Yes,N=No)');
            $table->timestamps();

            $table->unique(['saas_id', 'id'], 'ind_saas_active');
            $table->index(['saas_id', 'package_id'], 'ind_saas_pkg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_packages');
    }
};
