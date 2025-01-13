<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('referrer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('organization_name')->nullable();
            $table->string('contact_first_name');
            $table->string('contact_last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email');
            $table->string('organization')->nullable();
            $table->string('parent_organization')->nullable();
            $table->string('referral_source')->nullable();
            $table->string('sales_source')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('referrer_infos');
    }
};
