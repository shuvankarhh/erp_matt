<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('name');
            $table->unsignedTinyInteger('type');
            $table->unsignedTinyInteger('priority');
            $table->unsignedBigInteger('assigned_to')->index();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->unsignedTinyInteger('completion_status')->default('1');
            $table->unsignedTinyInteger('is_compleate')->default('0');// new added
            $table->unsignedSmallInteger('timezone_id')->index();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_tasks');
    }
};
