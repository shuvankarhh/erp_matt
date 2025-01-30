<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_equipment_usages', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('task_id')->index();
            $table->unsignedBigInteger('project_id')->index();
            $table->string('equipment_name');
            $table->integer('duration')->comment('Duration in minutes');
            $table->text('maintenance_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_equipment_usages');
    }
};
