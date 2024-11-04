<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobile_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable()->default('nill');
            $table->string('email')->nullable()->default('nill');
            $table->string('bid_price')->nullable()->default('nill');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
