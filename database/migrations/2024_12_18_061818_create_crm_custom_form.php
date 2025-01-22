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
        Schema::create('crm_custom_form', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('form_name');
            $table->text('form_body')->nullable();
            $table->text('form_view')->nullable();
            $table->string('background_color')->nullable()->default('#ffffff');
            $table->string('font_style')->nullable()->default('font-sans');
            $table->string('font_size')->nullable()->default('16');
            $table->string('from_body_color')->nullable();
            $table->string('column_number')->nullable()->default('grid-cols-1');
            $table->string('display_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_custom_form');
    }
};
