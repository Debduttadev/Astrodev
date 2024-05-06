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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            //foreign key from user table id
            $table->foreignId('userId')->constrained(
                table: 'users',
                indexName: 'invoices_user_id'
            )->onUpdate('cascade')->onDelete('cascade');

            //foreign key from appointments table id
            $table->foreignId('appointmentId')->constrained(
                table: 'appointments',
                indexName: 'invoices_appointments_id'
            )->onUpdate('cascade')->onDelete('cascade');

            $table->integer('amount');
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->date('DateOfpayment');
            $table->string('TimeOfpayment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
