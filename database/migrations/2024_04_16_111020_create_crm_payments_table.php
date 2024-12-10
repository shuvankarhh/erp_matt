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
        Schema::create('crm_payments', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->decimal('money_amount', 13, 3)->nullable();
            $table->decimal('gateway_fee', 13, 3)->nullable();
            $table->string('payer_name')->nullable();
            $table->unsignedSmallInteger('payment_gateway_id')->nullable()->index();
            $table->string('transaction_id')->nullable()->fullText();
            $table->unsignedTinyInteger('payment_status')->nullable();
            $table->unsignedSmallInteger('storage_provider_id')->nullable()->index();
            $table->boolean('is_private_document');
            $table->string('reference_document_path')->nullable();
            $table->string('reference_document_url')->nullable();
            $table->string('original_reference_document_name')->nullable();
            $table->boolean('is_reference_document_viewable');
            $table->unsignedBigInteger('created_by')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_payments');
    }
};
