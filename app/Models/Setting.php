<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    'site_name',
    'contact_email',
    'footer_text',
];
}
