<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crm_sales', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->default('1');
            $table->string('name');
            $table->unsignedSmallInteger('timezone_id')->index()->nullable();
            $table->unsignedSmallInteger('pipeline_id')->index()->nullable();
            $table->unsignedSmallInteger('pipeline_stage_id')->index()->nullable();
            $table->decimal('price', 13, 3)->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('final_price', 13, 3)->nullable();
            $table->timestamp('close_date')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable()->index();
            $table->unsignedTinyInteger('sale_type')->nullable()->comment('1=New Business, 2=Existing Business');
            $table->unsignedTinyInteger('priority')->nullable()->comment('1=Low, 2=Medium, 3=High');
            $table->unsignedBigInteger('organization_id')->nullable()->index();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('billing_address_id')->nullable()->index();
            $table->unsignedBigInteger('shipping_address_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_sales');
    }
};
