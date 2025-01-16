<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mobile_repairings', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_name');
            $table->text('issue');
            $table->string('device_type')->default('Android');
            $table->string('status')->default('Pending');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobile_repairings');
    }
};
