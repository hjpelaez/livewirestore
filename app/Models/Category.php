<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description'];

    // una categoría tiene  muchos posts - 1-N
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getImageUrl()
    {
        return URL::asset('storage/images/' . $this->image);
    }

}
