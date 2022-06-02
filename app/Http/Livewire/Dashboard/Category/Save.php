<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{

    use WithFileUploads;

    // crear propiedades
    public $title, $description, $image;
    public $category;

    // reglas de validación
    // finalmente fueron guardadas directamente (mirar: $this->validate() )
    protected $rules = [
        'title' => '',
        'description' => '',
        'image' => '',
    ];

    public function mount($id = null)
    {
        if ($id != null) {

            // esta función devuelve 404 si no existe la categoría
            $this->category = Category::findOrFail($id);
            // inicializa las propiedades con lo que está en la bbdd
            $this->title = $this->category->title;
            $this->description = $this->category->description;

        }

    }

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {

        // actualizamos o creamos
        if ($this->category) {

            // validamos antes de crear y guardar
            $this->validate([
                'title' => [
                    'required',
                    'min:6',
                    'max:255',
                    Rule::unique('categories')->ignore($this->category->id),
                ],
                'description' => 'nullable|min:6|max:255',
                'image' => 'nullable|image|max:1024',
            ]);

            // si existe la categoría actualiza las propiedades
            $this->category->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'description' => $this->description,
            ]);
            $this->emit('updated');

        } else {

            // validamos antes de crear y guardar
            $this->validate([
                'title' => [
                    'required',
                    'min:6',
                    'max:255',
                    Rule::unique('categories'),
                ],
                'description' => 'nullable|min:6|max:255',
                'image' => 'nullable|image|max:1024',
            ]);

            // si no existe la categoría la crea y crea las propiedades
            $this->category = Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'description' => $this->description,
            ]);
            $this->emit('created');

        }

        // upload image
        if ($this->image) {

            Storage::disk('public')->delete('images/' . $this->category->image);

            // renombramos la imagen
            $imageName = $this->category->slug . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('images', $imageName, 'public');

            $this->category->update([
                'image' => $imageName,
            ]);
        }

    }

    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete('images/' . $this->category->image);
        }

    }

}
