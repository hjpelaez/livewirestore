<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactDetail;
use Livewire\Component;

class Detail extends Component
{
    protected $listeners = ['parentId'];

    public $extra;

    public $parentId;

    protected $rules = [
        'extra' => 'required|min:2|max:500',
    ];

    public function render()
    {

        // Verificar las relaciones generales y detalles en la ruta:Detail

        // model: ContactDetail - table: contact_details
        // dd(ContactDetail::find(1));

        // model: ContactGeneral - table: contact_generals
        // dd(ContactDetail::find(1)->general);

        // model: ContactGeneral - table: contact_generals
        //dd(ContactGeneral::find(1));

        // model: ContactDetaill - table: contact_details
        // dd(ContactGeneral::find(1)->detail);

        return view('livewire.contact.detail');
    }

    public function submit()
    {

        $this->validate();

        ContactDetail::updateOrCreate(
            ['contact_general_id' => $this->parentId],
            [
                'extra' => $this->extra,
                'contact_general_id' => $this->parentId,
            ]
        );

        $this->emit('stepEvent', 4);
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;

        $c = ContactDetail::where('contact_general_id', $this->parentId)->first();

        if ($c != null) {
            $this->extra = $c->extra;
        }
    }
}
