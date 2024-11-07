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
            $table->string('cardType')->after('type')->nullable();
            $table->string('pgTransactionId')->after('type')->nullable()->nullable();
            $table->string('bankTransactionId')->after('type')->nullable()->nullable();
            $table->string('pgAuthorizationCode')->after('type')->nullable()->nullable();
            $table->string('bankId')->after('type')->nullable()->nullable();
            $table->string('brn')->after('type')->nullable()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('cardType');
            $table->string('pgTransactionId');
            $table->string('bankTransactionId');
            $table->string('pgAuthorizationCode');
            $table->string('bankId');
            $table->string('brn');
        });
    }
};
