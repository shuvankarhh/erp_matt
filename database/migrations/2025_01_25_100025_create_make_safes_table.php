<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('make_safes', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('form_id'); // 1 for internal, 2 for external

            // Internal Form Fields (for Technicians)
            $table->text('structural_stabilization')->nullable();
            $table->text('electrical_isolation')->nullable();
            $table->text('debris_removal')->nullable();
            $table->text('additional_comments')->nullable();
            $table->json('media_uploads')->nullable();
            $table->string('technician_signature')->nullable();

            // External Form Fields (for Subcontractors)
            $table->boolean('task_verified')->nullable();
            $table->string('subcontractor_signature')->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('make_safes');
    }
};
