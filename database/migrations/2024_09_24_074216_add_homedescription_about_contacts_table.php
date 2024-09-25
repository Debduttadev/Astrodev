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
        Schema::table('about_contacts', function (Blueprint $table) {
            $table->longText('homedescription')->after('description');
        });

        DB::table('about_contacts')
            ->insert(array(
                array('title' => "astrology", 'homedescription' => "astrology", 'description' => "astrology"),
            ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_contacts', function (Blueprint $table) {
            $table->dropColumn('homedescription');
        });
    }
};
