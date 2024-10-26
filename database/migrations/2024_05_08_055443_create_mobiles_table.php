<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_poster_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('image')->nullable()->default('nill');
            $table->string('name');
            $table->string('price')->nullable()->default(00);
            $table->string('release_date')->nullable()->default('nill');
            $table->string('sim_support')->nullable()->default('nill');
            $table->string('operating_system')->nullable()->default('nill');
            $table->string('phone_weight')->nullable()->default('nill');
            $table->string('phone_dimensions')->nullable()->default('nill');
            $table->string('screen_size')->nullable()->default('nill');
            $table->string('screen_resolution')->nullable()->default('nill');
            $table->string('screen_type')->nullable()->default('nill');
            $table->string('screen_protection')->nullable()->default('nill');
            $table->string('internal_memory')->nullable()->default('nill');
            $table->string('ram')->nullable()->default('nill');
            $table->string('card_slot')->nullable()->default('nill');
            $table->string('processor')->nullable()->default('nill');
            $table->string('gpu')->nullable()->default('nill');
            $table->string('battery')->nullable()->default('nill');
            $table->string('front_camera')->nullable()->default('nill');
            $table->string('front_flash')->nullable()->default('nill');
            $table->string('front_video_recording')->nullable()->default('nill');
            $table->string('back_camera')->nullable()->default('nill');
            $table->string('back_flash')->nullable()->default('nill');
            $table->string('back_video_recording')->nullable()->default('nill');
            $table->string('bluetooth')->nullable()->default('nill');
            $table->string('3G')->nullable()->default('nill');
            $table->string('4G/LTE')->nullable()->default('nill');
            $table->string('5G')->nullable()->default('nill');
            $table->string('radio')->nullable()->default('nill');
            $table->string('wifi')->nullable()->default('nill');
            $table->string('nfc')->nullable()->default('nill');
            $table->boolean('is_new')->default(false);
            $table->text('lat')->default('0.0');
            $table->text('lng')->default('0.0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles');
    }
};
