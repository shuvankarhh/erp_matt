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
        Schema::create('site_contacts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('tenant_id');
            $table->string('name'); // Contact name
            $table->string('email')->unique(); // Contact email
            $table->string('phone')->nullable(); // Contact phone
            $table->string('role')->nullable(); // Contact role
            $table->unsignedBigInteger('project_id'); // Foreign key to the 'projects' table
            $table->timestamps(); // Created at and updated at timestamps
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_contacts');
    }
};
