<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id', 'title', 'duration', 'description', 'artist', 'feat'
    ];

    protected $casts = [
        'feat' => 'array'
    ];
}
