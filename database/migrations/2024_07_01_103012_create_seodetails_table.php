<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seodetails', function (Blueprint $table) {
            $table->id();
            //page name like service, aboutus, home
            $table->string('page');
            //if page is related to any id like service id, blog id
            $table->integer('relatedid')->default('0');
            $table->string('title');
            $table->string('keyword');
            $table->string('description');
            $table->longText('metadata');
            $table->timestamps();
        });

        DB::table('seodetails')
            ->insert(array(array('page' => "home", 'relatedid' => "0", 'title' => 'This is a home page of astro achariya debdutta website', 'keyword' => 'Best Astrologer in India | Kundli | Consultation - Astro Achariya Debdutta', 'description' => "Astro Achariya debdutta is Best astrologer in India. Get Kundli report, consultation, courses in astrology, numerology &amp; vastu.", 'metadata' => '<meta property="og:url" content="https://astroachariyadebdutta.com/" />')));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seodetails');
    }
};
