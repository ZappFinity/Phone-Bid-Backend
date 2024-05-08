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
            $table->string('image');
            $table->string('name');
            $table->string('price');
            $table->string('release_date');
            $table->string('sim_support');
            $table->string('operating_system');
            $table->string('phone_weight');
            $table->string('phone_dimensions');
            $table->string('screen_size');
            $table->string('screen_resolution');
            $table->string('screen_type');
            $table->string('screen_protection');
            $table->string('internal_memory');
            $table->string('ram');
            $table->string('card_slot');
            $table->string('processor');
            $table->string('gpu');
            $table->string('battery');
            $table->string('front_camera');
            $table->string('front_flash');
            $table->string('front_video_recording');
            $table->string('back_camera');
            $table->string('back_flash');
            $table->string('back_video_recording');
            $table->string('bluetooth');
            $table->string('3G');
            $table->string('4G/LTE');
            $table->string('5G');
            $table->string('radio');
            $table->string('wifi');
            $table->string('nfc');
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
