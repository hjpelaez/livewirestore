<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description'];

    // un post tiene muchas etiquetas - 1-N
    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
