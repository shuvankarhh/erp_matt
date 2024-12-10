<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crm_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('name');
            $table->string('domain_name', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code', 10);
            $table->string('phone', 30)->nullable();
            $table->unsignedBigInteger('owner_id')->nullable()->index();
            $table->unsignedTinyInteger('industry_id')->nullable()->index();
            $table->string('stakeholder_type')->nullable();
            $table->unsignedInteger('number_of_employees')->nullable();
            $table->unsignedBigInteger('annual_revenue')->nullable();
            $table->unsignedSmallInteger('timezone_id')->nullable()->index();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('primary_address_id')->nullable()->index();
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
        Schema::dropIfExists('crm_organizations');
    }
}
