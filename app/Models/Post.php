<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'date', 'image', 'description', 'text', 'posted', 'type', 'category_id'];

    // un post pertenece a una categoría - 1-1
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // muchos posts tienen muchas etiquetas N-M
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }

}
