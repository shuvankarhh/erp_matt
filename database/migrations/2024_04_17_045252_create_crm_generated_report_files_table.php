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
        Schema::create('crm_generated_report_files', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('name');
            $table->unsignedSmallInteger('storage_provider_id')->nullable()->index();
            $table->boolean('is_private_file');
            $table->string('file_path')->nullable(); // images/abc.jpg
            $table->string('file_url')->nullable();
            $table->boolean('is_viewable');
            $table->unsignedBigInteger('created_by')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_generated_report_files');
    }
};
