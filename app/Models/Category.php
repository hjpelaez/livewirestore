<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    // cambiar presentación de los datos: Accessors & Mutators
    protected function title(): Attribute
    {
        return Attribute::make(
            get:fn($value) => ucfirst($value),
            set:fn($value) => strtolower($value),
        );
    }

}
