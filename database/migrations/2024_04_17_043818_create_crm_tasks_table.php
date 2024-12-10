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
        Schema::create('crm_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('name');
            $table->unsignedTinyInteger('type');
            $table->unsignedTinyInteger('priority');
            $table->unsignedBigInteger('assigned_to')->index();
            $table->unsignedTinyInteger('completion_status');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->unsignedSmallInteger('user_timezone_id')->index();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_tasks');
    }
};
