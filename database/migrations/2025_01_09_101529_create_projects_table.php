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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('inTheCustomer');
            $table->string('contact_id')->nullable();
            $table->string('contact_organisation_name')->nullable();

            $table->string('order_number')->nullable();
            $table->string('parent_organisation_id')->nullable();
            $table->string('sales_person_id')->nullable();
            $table->string('project_type_id')->nullable();
            $table->string('service_type_id')->nullable();
            $table->string('property_type')->nullable();
            $table->string('year_built')->nullable();
            $table->string('insurance_information')->nullable();
            $table->string('insurance_information_id')->nullable();
            $table->string('price_list_id')->nullable();
            $table->string('referralSource')->nullable();
            $table->string('referral_source_id')->nullable();
            $table->string('assigned_staff')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
