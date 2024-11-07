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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('cardType')->nullable()->change();
            $table->string('pgTransactionId')->nullable()->change();
            $table->string('bankTransactionId')->nullable()->change();
            $table->string('pgAuthorizationCode')->nullable()->change();
            $table->string('bankId')->nullable()->change();
            $table->string('brn')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('cardType')->change();
            $table->string('pgTransactionId')->change();
            $table->string('bankTransactionId')->change();
            $table->string('pgAuthorizationCode')->change();
            $table->string('bankId')->change();
            $table->string('brn')->change();
        });
    }
};
