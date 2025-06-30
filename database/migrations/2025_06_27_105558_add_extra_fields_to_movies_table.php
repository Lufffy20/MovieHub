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
        Schema::table('movies', function (Blueprint $table) {
             $table->text('story')->nullable();
    $table->text('cast')->nullable();
    $table->string('imdb_rating')->nullable();
    $table->text('review')->nullable();
    $table->json('screenshots')->nullable(); // For multiple image names
    $table->string('download_4k')->nullable();
    $table->string('download_1080p')->nullable();
    $table->string('download_720p')->nullable();
    $table->string('download_480p')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            //
        });
    }
};
