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
        Schema::create('mediaand_documentations', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('task_id');
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedSmallInteger('storage_provider_id')->nullable()->index();
            $table->boolean('is_private_file')->default(0);
            $table->string('file_path')->nullable();
            $table->string('file_url')->nullable();
            $table->string('original_file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediaand_documentations');
    }
};
