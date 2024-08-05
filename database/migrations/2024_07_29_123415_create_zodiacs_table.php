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
        Schema::create('zodiacs', function (Blueprint $table) {
            $table->id();
            $table->string('zodiac_name');
            $table->string('zodiac_sign');
            $table->string('image');
            $table->string('nature');
            $table->string('colortype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zodiacs');
    }
};
