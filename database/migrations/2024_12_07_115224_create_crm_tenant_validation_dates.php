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
        Schema::create('crm_tenant_validation_dates', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('tenant_id');  // Foreign key to tenants table
            $table->morphs('entity');  // Polymorphic relation for different entity types (subscriptions, licenses, etc.)
            $table->date('start_date');  // Start date for validation
            $table->date('end_date');  // End date for validation
            $table->boolean('is_valid');  // Validity flag (if the current date is within the validation period)
            $table->integer('validation_status');  // Status of the validation
            $table->timestamps();  // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_tenant_validation_dates');
    }
};
