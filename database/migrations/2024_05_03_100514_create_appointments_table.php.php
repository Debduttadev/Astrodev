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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            //foreign key from user table id
            $table->foreignId('userId')->constrained(
                table: 'users',
                indexName: 'appointments_user_id'
            )->onUpdate('cascade')->onDelete('cascade');

            //foreign key from chambers table id
            $table->foreignId('chamberId')->constrained(
                table: 'chambers',
                indexName: 'appointments_chambers_id'
            )->onUpdate('cascade')->onDelete('cascade');

            $table->string('phoneNumber')->nullable();
            $table->enum('gender', ['m', 'f', 'o']);
            $table->date('dateOfBirth');
            $table->string('placeOfBirth');
            $table->time('timeOfBirth');
            $table->date('bookingDate');
            $table->enum('appointmentType', ['o', 'm']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};