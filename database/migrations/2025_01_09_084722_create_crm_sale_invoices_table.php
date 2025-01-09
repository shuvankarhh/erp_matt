<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_sale_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('sale_id')->nullable()->index();
            $table->string('invoice_number')->nullable();
            $table->timestamp('invoice_date');
            $table->timestamp('due_date')->nullable();
            $table->unsignedSmallInteger('timezone_id')->index();
            $table->string('po_number')->nullable();
            $table->decimal('price', 13, 2)->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('final_price', 13, 2)->nullable();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable()->index();
            $table->unsignedBigInteger('organization_id')->nullable()->index();
            $table->unsignedBigInteger('billing_address_id')->nullable()->index();
            $table->unsignedBigInteger('shipping_address_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_sale_invoices');
    }
};
