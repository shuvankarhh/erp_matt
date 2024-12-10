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
        Schema::create('crm_custome_from_fields', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('user_id');
            $table->string('field_name');
            $table->string('field_type');
            $table->boolean('is_required')->default(false); 
            $table->text('default_value')->nullable(); 
            $table->text('options')->nullable(); 
            $table->text('media_type')->nullable(); 
            $table->text('is_global')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_custome_from_fields');
    }
};
