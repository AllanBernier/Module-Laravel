<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'picture'
    ];


    protected static function boot()
    {
        parent::boot();

        self::deleting(function(Blog $blog) {
            Storage::delete($blog->picture);
        });
    }


}
