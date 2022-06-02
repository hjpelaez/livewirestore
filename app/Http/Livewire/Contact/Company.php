<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactCompany;
use Livewire\Component;

class Company extends Component
{

    protected $listeners = ['parentId'];

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'identification' => 'required|digits_between:2,20|numeric',
        'email' => 'required|email',
        'choices' => 'required',
        'extra' => 'required|min:2|max:255',
    ];

    public $name;
    public $identification;
    public $email;
    public $choices;
    public $extra;

    public $parentId;

    public function render()
    {
        // Verificar las relaciones generales y personas en la ruta:Company

        // Model: ContactCompany - table:contact_companies
        //dd(ContactCompany::find(1));

        // Relación verificada: parent-model: ContactCompany
        // dd(ContactCompany::find(1)->general());

        return view('livewire.contact.company');
    }

    public function submit()
    {
        $this->validate();

        ContactCompany::updateOrCreate(
            ['contact_general_id' => $this->parentId],
            [
                'name' => $this->name,
                'identification' => $this->identification,
                'extra' => $this->extra,
                'email' => $this->email,
                'choices' => $this->choices,
                'contact_general_id' => $this->parentId,
            ]
        );

        $this->emit('stepEvent', 3);
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;

        $c = ContactCompany::where('contact_general_id', $this->parentId)->first();

        if ($c != null) {
            $this->name = $c->name;
            $this->identification = $c->identification;
            $this->email = $c->email;
            $this->choices = $c->choices;
            $this->extra = $c->extra;
        }
    }
}
