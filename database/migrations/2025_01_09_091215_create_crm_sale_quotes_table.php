<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crm_sale_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->bigInteger('sale_id')->nullable()->index();
            $table->string('name');
            $table->timestamp('expiration_date');
            $table->unsignedSmallInteger('timezone_id')->index();
            $table->decimal('price', 13, 3)->nullable();
            $table->decimal('discount_percentage', 5, 2);
            $table->decimal('final_price', 13, 3)->nullable();
            $table->string('comment')->nullable();
            $table->bigInteger('owner_id')->nullable()->index();
            $table->bigInteger('organization_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crm_sale_quotes');
    }
};
