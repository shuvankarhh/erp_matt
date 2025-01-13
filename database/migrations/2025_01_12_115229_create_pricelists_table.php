<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->decimal('from_price', 10, 2);
            $table->decimal('to_price', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricelists');
    }
};
