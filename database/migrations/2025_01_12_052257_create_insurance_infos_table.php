<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('insurance_infos', function (Blueprint $table) {

            $table->id();
            $table->string('tenant_id');
            $table->string('company_name');
            $table->string('insurance_policy');
            $table->string('insurance_claim_name');
            $table->string('loss_adjuster_reference')->nullable();
            $table->string('insurance_companyo_reference')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insurance_infos');
    }
};
