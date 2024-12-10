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
        Schema::create('crm_website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('company_name');
            $table->string('company_address')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_logo');
            $table->string('favicon');
            $table->string('seo_description');
            $table->boolean('is_auto_report');
            $table->unsignedTinyInteger('auto_report_scedule');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_website_settings');
    }
};
