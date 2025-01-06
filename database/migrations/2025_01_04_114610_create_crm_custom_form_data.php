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
        Schema::create('crm_custom_form_data', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->text('question');
            $table->string('question_name');
            $table->text('answer');
            $table->string('unique_number')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_custom_form_data');
    }
};
