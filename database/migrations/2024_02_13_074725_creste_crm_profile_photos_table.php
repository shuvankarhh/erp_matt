<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_profile_photos', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedSmallInteger('storage_provider_id')->nullable()->index();
            $table->boolean('is_private_photo');
            $table->string('photo_path')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('original_photo_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_profile_photos');
    }
};
