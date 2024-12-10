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
        Schema::create('crm_storage_providers', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->string('tenant_id');
            $table->string('name');
            $table->string('alias')->unique();
            $table->string('logo_path');
            $table->json('credentials');
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('acting_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_storage_providers');
    }
};
