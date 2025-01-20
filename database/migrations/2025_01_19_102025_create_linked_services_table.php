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
        Schema::create('linked_services', function (Blueprint $table) {
            
            $table->id(); // Primary key
            $table->string('service_name'); // Name of the service
            $table->string('type'); // Service type
            $table->string('subtype')->nullable(); // Service subtype
            $table->string('insurance_policy')->nullable(); // Insurance policy details
            $table->text('notes')->nullable(); // Additional notes
            $table->unsignedBigInteger('project_id'); // Link to a project
            $table->unsignedBigInteger('tenant_id'); // Link to tenant or organization
            $table->timestamps(); // Created and updated timestamps
            $table->softDeletes(); // Soft delete timestamp

            // Add foreign key constraint for project_id
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linked_services');
    }
};
