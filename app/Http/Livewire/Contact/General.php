<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactGeneral;
use Livewire\Component;

class General extends Component
{

    public $subject;
    public $message;
    public $type;

    public $step = 1;

    public $pk; // el id

    protected $listeners = ['stepEvent'];

    protected $rules = [
        'subject' => 'required|min:2|max:255',
        'message' => 'required|min:2|max:255',
        'type' => 'required',

    ];

    public function render()
    {
        // Verificar las relaciones generales y personas en la ruta:General

        // model: ContactGeneral - table: contact_generals
        // dd(ContactGeneral::find(1));

        // model: ContactPerson - table: contact_persons
        // dd(ContactGeneral::find(1)->person);

        // model: ContactPerson - table: contact_persons
        //dd(ContactPerson::find(1));

        // model: ContactGeneral - table: contact_generals
        // dd(ContactPerson::find(1)->general);

        return view('livewire.contact.general');
    }

    public function submit()
    {
        $this->validate();

        if ($this->pk) {
            ContactGeneral::where('id', $this->pk)->update([
                'subject' => $this->subject,
                'message' => $this->message,
                'type' => $this->type,
            ]);

        } else {
            $this->pk = ContactGeneral::create([
                'subject' => $this->subject,
                'message' => $this->message,
                'type' => $this->type,
            ])->id;

        }

        $this->stepEvent(2);

    }

    public function stepEvent($step)
    {
        if ($step == 2) {
            if ($this->type == 'company') {
                $this->step = 2.1;
            } elseif ($this->type == 'person') {
                $this->step = 2.2;
            }
        } else {
            $this->step = $step;
        }

        $this->emit('parentId', $this->pk);

    }
}
