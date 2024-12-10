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
        Schema::create('crm_sale_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('sale_id')->index();
            $table->string('title');
            $table->string('holder_name')->nullable();
            $table->string('phone_code', 10);
            $table->string('phone', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->unsignedSmallInteger('country_id')->index();
            $table->unsignedSmallInteger('state_id')->index();
            $table->unsignedMediumInteger('city_id')->index();
            $table->string('postal_code', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_sale_addresses');
    }
};
