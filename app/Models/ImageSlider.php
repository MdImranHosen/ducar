<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $guard = 'image_slider';
    
    protected $fillable = [
        'title',
        'description',
        'image_name',
    ];
}
