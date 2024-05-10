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
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('price');
            $table->string('release_date')->nullable();
            $table->string('sim_support')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('phone_weight')->nullable();
            $table->string('phone_dimensions')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->string('screen_type')->nullable();
            $table->string('screen_protection')->nullable();
            $table->string('internal_memory')->nullable();
            $table->string('ram')->nullable();
            $table->string('card_slot')->nullable();
            $table->string('processor')->nullable();
            $table->string('gpu')->nullable();
            $table->string('battery')->nullable();
            $table->string('front_camera')->nullable();
            $table->string('front_flash')->nullable();
            $table->string('front_video_recording')->nullable();
            $table->string('back_camera')->nullable();
            $table->string('back_flash')->nullable();
            $table->string('back_video_recording')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('3G')->nullable();
            $table->string('4G/LTE')->nullable();
            $table->string('5G')->nullable();
            $table->string('radio')->nullable();
            $table->string('wifi')->nullable();
            $table->string('nfc')->nullable();
            $table->boolean('is_new')->default(false);
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
