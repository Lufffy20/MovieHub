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
       Schema::create('films', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->text('story')->nullable();
        $table->text('cast')->nullable();
        $table->string('imdb_rating')->nullable();
        $table->text('review')->nullable();
        $table->json('screenshots')->nullable(); // array of image filenames
        $table->string('download_4k')->nullable();
        $table->string('download_1080p')->nullable();
        $table->string('download_720p')->nullable();
        $table->string('download_480p')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
