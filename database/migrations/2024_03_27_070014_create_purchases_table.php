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
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id');
            $table->unsignedInteger('vendor_id');
            $table->unsignedInteger('outlet_id');
            $table->decimal('grand_total', 11)->unsigned()->default(0);
            $table->char('status', 1)->default('A')->comment('radio(A=Active,I=Inactive)');
            $table->char('payment_status', 1)->default('P')->comment('radio(P=Paid,U=Unpaid)');
            $table->decimal('order_tax', 10)->default(0);
            $table->char('tax_type', 1)->default('P')->comment('radio(P=Percentage,A=Amount)');
            $table->decimal('tax_total', 10)->default(0);
            $table->decimal('discount', 10)->default(0);
            $table->char('discount_type', 1)->default('A')->comment('radio(P=Percentage,A=Amount)');
            $table->decimal('discount_total', 10)->default(0);
            $table->decimal('shipping_cost', 10)->unsigned()->default(0);
            $table->decimal('other_expense', 10)->unsigned()->default(0);
            $table->text('purchase_note')->comment('textarea');
            $table->unsignedInteger('added_by')->nullable()->default(0);
            $table->unsignedInteger('total_item')->default(0);
            $table->unsignedInteger('total_quantity')->default(0);
            $table->timestamps();

            $table->index(['saas_id', 'added_by'], 'saas_added_by');
            $table->unique(['saas_id', 'id'], 'saas_id');
            $table->index(['saas_id', 'outlet_id', 'vendor_id'], 'saas_outlet_vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
