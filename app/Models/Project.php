<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description',
        'technologies',
        'image_url',
        'project_url',
        'github_url',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
