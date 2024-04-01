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
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saas_id')->default(0);
            $table->unsignedInteger('outlet_id')->default(0);
            $table->char('label', 150)->default('');
            $table->char('type', 1)->default('T')->comment('radio(T=Textbox,M=Textarea,N=Numeric,D=Date,S=Switch,R=Radio,W=Dropdown,U=URL Input,C=Checkbox)');
            $table->char('is_half_field', 1)->default('Y')->comment('radio(Y=Yes,N=No)');
            $table->char('is_required', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->char('status', 1)->default('A')->comment('radio(A=Active,I=Inactive)');
            $table->char('help_text')->default('');
            $table->char('is_calculable', 1)->default('N')->comment('radio(Y=Yes,N=No)');
            $table->char('show_where', 1)->default('C')->comment('radio(C=Customer Add, U=User Add, I=Invoice)');
            $table->text('options')->nullable();
            $table->unsignedInteger('fld_order')->default(0);
            $table->unsignedInteger('fld_limit')->default(0);
            $table->char('operator', 2)->nullable()->default('');
            $table->char('position', 1)->default('A');
            $table->string('param')->default('');
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
        Schema::dropIfExists('custom_fields');
    }
};
