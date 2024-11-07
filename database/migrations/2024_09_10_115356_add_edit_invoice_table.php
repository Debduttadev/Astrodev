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
            $table->string('utr')->after('type')->nullable();
            $table->string('arn')->after('type')->nullable();
            $table->string('pgServiceTransactionId')->after('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('utr');
            $table->dropColumn('arn');
            $table->dropColumn('pgServiceTransactionId');
        });
    }
};
