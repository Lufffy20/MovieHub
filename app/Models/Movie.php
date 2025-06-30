<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
protected $fillable = [
    'title',
    'image',
    'description',
    'story',
    'cast',
    'imdb_rating',
    'review',
    'screenshots',
    'download_4k',
    'download_1080p',
    'download_720p',
    'download_480p'
];

public function categories()
{
    return $this->belongsToMany(Category::class);
}

public function movies()
{
    return $this->belongsToMany(Movie::class);
}


}
