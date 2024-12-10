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
        Schema::create('crm_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('description')->nullable();
            $table->unsignedTinyInteger('type');
            $table->smallInteger('storage_provider_id')->nullable()->index();
            $table->boolean('is_private_image');
            $table->string('image_path')->nullable();
            $table->string('image_url')->nullable();
            $table->string('original_image_name')->nullable();
            $table->string('solution_url')->nullable();
            $table->unsignedTinyInteger('currency_id')->index();
            $table->decimal('price', 13, 3)->nullable();
            $table->decimal('cost', 13, 3)->nullable();
            $table->decimal('tax_percentage', 5, 2);
            $table->unsignedTinyInteger('subscription_interval')->nullable();
            $table->smallInteger('subscription_term')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_solutions');
    }
};
