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
        Schema::table('phonepes', function (Blueprint $table) {
            $table->string('hosturl')->after('paymentamount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phonepes', function (Blueprint $table) {
            $table->dropColumn('hosturl');
        });
    }
};
