<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    // problema de plural y singular de persons, busca una tabla llamada contact_people: personas
    // definimos que la tabla se llama contact_persons
    protected $table = "contact_persons";

    public $timestamps = false;

    protected $fillable = ['name', 'surname', 'email', 'contact_general_id', 'choices', 'other'];

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class, 'contact_general_id');
    }
}
