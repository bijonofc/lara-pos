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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('saas_id')->default(0);
            $table->char('name');
            $table->char('private_note', 100);
            $table->char('slug');
            $table->char('status', 50)->default('A')->comment('radio(A=Activr,I=Inactive)');
            $table->char('type', 2)->default('SI')->comment('drop(SI=Simple,VR=Variation,VA=Variable,GR=Group)');
            $table->char('is_serial', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->char('featured', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->string('short_description')->default('');
            $table->string('sku')->default('');
            $table->decimal('price', 11)->unsigned()->default(0);
            $table->decimal('regular_price', 11)->unsigned()->default(0);
            $table->string('barcode', 128)->default('');
            $table->string('tax_status', 100)->default('');
            $table->string('tax_class', 100)->default('');
            $table->char('manage_stock', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->unsignedInteger('category_id')->default(0);
            $table->string('tags', 100)->default('');
            $table->integer('brand_id')->default(0);
            $table->unsignedInteger('image_id')->default(0);
            $table->string('gallery_image_ids', 100)->default('');
            $table->timestamps();

            $table->index(['saas_id', 'barcode'], 'saas_barcode');
            $table->unique(['saas_id', 'id'], 'saas_product');
            $table->index(['saas_id', 'name'], 'saas_product_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
