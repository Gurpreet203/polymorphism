<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

     public function post()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
    public function video()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
