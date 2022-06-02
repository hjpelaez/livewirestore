<?php

namespace App\Models;

use App\Models\ContactCompany;
use App\Models\ContactDetail;
use App\Models\ContactPerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGeneral extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message', 'type'];

    public function person()
    {
        return $this->hasOne(ContactPerson::class);
    }

    public function company()
    {
        return $this->hasOne(ContactCompany::class);
    }

    public function detail()
    {
        return $this->hasOne(ContactDetail::class);

    }
}
