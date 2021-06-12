<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'image',
    ];

    protected $attributes = [
        'status' => 1,
    ];
}
