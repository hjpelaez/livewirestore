<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    // Propiedades para el buscador y los filtros
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $quantity = '10';

    // Enviar datos a la url y las excepciones por defecto
    protected $queryString = [
        'quantity' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    // recibir el emitTo delete desde javascript, para borrar la categoría
    protected $listeners = ['delete'];

    // Resetear la paginación de la url cuando hacemos una búsqueda y estamos en una página de resultados
    // Modo: la palabra "updating" + el nombre de la propiedad $search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Función que renderiza los datos a mostrar
    public function render()
    {
        $categories = Category::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->quantity);

        return view('livewire.dashboard.category.index', compact('categories'));

    }
    
    // Función para ordenar las búsquedas
    public function order($order)
    {
        if ($this->sort == $order) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        
        } else {
            $this->sort = $order;
            $this->direction = 'asc';
        }

    }

    public function delete(Category $category)
    {
        $category->delete();

    }
}
