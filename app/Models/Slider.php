<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image_path',
        'title',
        'short_description',
        'order',
    ];
}