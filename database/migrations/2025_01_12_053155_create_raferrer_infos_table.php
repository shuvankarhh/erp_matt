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
        Schema::create('raferrer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('organisation_name');
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('organisation');
            $table->string('parent_organisation');
            $table->string('referral_source');
            $table->string('sales_source');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raferrer_infos');
    }
};
