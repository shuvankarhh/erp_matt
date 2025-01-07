<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('staff_reference_id')->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('phone', 30)->nullable();
            $table->unsignedBigInteger('line_manager')->nullable()->index();
            $table->unsignedTinyInteger('gender');
            $table->string('address');
            $table->unsignedSmallInteger('team_id')->index();
            $table->unsignedSmallInteger('designation_id')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_staffs');
    }
};
