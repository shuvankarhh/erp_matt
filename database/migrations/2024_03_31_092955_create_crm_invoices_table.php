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
        Schema::create('crm_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('sale_id')->nullable()->index();
            $table->timestamp('invoice_date');
            $table->timestamp('due_date')->nullable();
            $table->string('po_number')->nullable();
            $table->unsignedSmallInteger('timezone_id')->index();
            $table->decimal('price', 13, 3)->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('final_price', 13, 3)->nullable();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable()->index();
            $table->unsignedBigInteger('organization_id')->nullable()->index();
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
        Schema::dropIfExists('crm_invoices');
    }
};
