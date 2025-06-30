<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
 protected $table = 'films';

    protected $fillable = [
        'title', 'description', 'image', 'story', 'cast', 'imdb_rating',
        'review', 'screenshots', 'download_4k', 'download_1080p', 'download_720p', 'download_480p'
    ];

    protected $casts = [
        'screenshots' => 'array',
    ];
}
