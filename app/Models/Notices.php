<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    use HasFactory;

    protected $guard = 'notices';
    
    protected $fillable = [
        'title',
        'description',
        'notice_file',
        'admin_name',
        'status',
    ];
}
