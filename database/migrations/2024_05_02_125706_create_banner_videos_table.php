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
        Schema::create('banner_videos', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('videolink')->nullable();
            $table->enum('thumbnailtype', ['0', '1']);
            $table->enum('show', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_videos');
    }
};
