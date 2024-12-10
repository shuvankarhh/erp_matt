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
        Schema::create('crm_countries', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('cca3', 3)->unique();
            $table->string('cca2', 2)->unique();
            $table->json('phone_codes');
            $table->string('currency_code');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->string('emoji');
            $table->text('timezones'); // should be json
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_countries');
    }
};
