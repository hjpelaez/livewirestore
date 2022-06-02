<?php

namespace App\Models;

use App\Models\ContactGeneral;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'identification', 'email', 'extra', 'contact_general_id', 'choices'];

    public function general()
    {
        return $this->belongsTo(ContactGeneral::class, 'contact_general_id');
    }
}
