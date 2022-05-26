<div class="">

    <header class="text-gray-500 mb-12 pb-3 border-b-2">
        <h1 class="text-2xl font-bold">Listado de todas las categorías</h1>
    </header>

    <article>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t">
            <div class="p-4 flex justify-between">

                {{-- Filtro de cantidad --}}
                <div class="flex items-center">
                    Mostrar
                    <select wire:model="quantity" class="search">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    Posts.
                </div>

                {{-- Campo de búsqueda --}}
                <div class="relative">
                    <label for="table-search" class="sr-only">Search</label>
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <img src='{{ asset("images/lupa.svg") }}' alt='Buscador' class="w-4 h-4">
                    </div>
                    <input wire:model="search" type="text" id="table-search"
                        class="input w-80 pl-10" placeholder="Ingresa un término de búsqueda">
                </div>

                {{-- Botçon crear categoría --}}
                <a href="{{ route('d-category-create') }}">
                    <x-jet-button class=" bg-green-500 hover:bg-green-700">
                        Crear categoría
                    </x-jet-button>
                </a>

            </div>

            @if($categories->count())

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="p-4">
                            Imagen
                        </th>

                        <th wire:click="order('id')" scope="col" class="px-6 py-3 w-32">
                            ID
                            @if ($sort == 'id')

                            @if ($direction == 'asc')
                            <img src='{{ asset("images/numero-ascendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @else
                            <img src='{{ asset("images/numero-descendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif

                            @else
                            <img src='{{ asset("images/filtro.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif

                        </th>

                        <th wire:click="order('title')" scope="col" class="px-6 py-3 w-80">
                            Nombre
                            @if ($sort == 'title')

                            @if ($direction == 'asc')
                            <img src='{{ asset("images/letras-ascendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @else
                            <img src='{{ asset("images/letras-descendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif

                            @else
                            <img src='{{ asset("images/filtro.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif
                        </th>

                        <th wire:click="order('description')" scope="col" class="px-6 py-3">
                            Descripción
                            @if ($sort == 'description')

                            @if ($direction == 'asc')
                            <img src='{{ asset("images/letras-ascendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @else
                            <img src='{{ asset("images/letras-descendente.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif

                            @else
                            <img src='{{ asset("images/filtro.svg") }}' alt=''
                                class='h-4 w-4 float-right'>
                            @endif
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            Editar
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            Eliminar
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ( $categories as $category)

                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td scope="row" class="px-6">
                            @if ($category->image)
                            <img src='{{ $category->getImageUrl() }}' alt=''
                                class='rounded-full w-32 object-cover aspect-square'>
                            @else
                            <img src="{{ asset('images/foto.svg') }}" alt='' class='w-32'>
                            @endif

                        </td>

                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $category->id }}
                        </td>

                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $category->title }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $category->description }}
                        </td>

                        <td class="px-6 text-center">
                            <a href="{{ route('d-category-edit', $category) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>

                        <td class="px-6 text-center">
                            <a wire:click="$emit('deleteCategory', {{$category->id}})" class=" font-medium text-red-600 dark:text-red-500 hover:underline inline-flex
                                cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            @else

            <p class="px-4 py-12 text-lg">No hay resultados para el término de búsqueda:
                <strong>&laquo;{{ $search }}&raquo;</strong><br>
                Pruebe con otro término.
            </p>


            @endif

        </div>
    </article>

    @if($categories->count())
    <footer class="pt-12">
        {{ $categories->links() }}
    </footer>
    @endif



</div>

@push('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('deleteCategory', $categoryId =>{
                Swal.fire({
                title: '¿Estás seguro?',
                text: "Los registros eliminados no se pueden recuperar.",
                icon: 'warning',
                showCancelButton: 'yes',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, elimínalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('delete', $categoryId)
                        Swal.fire(
                        '¡Borrado!',
                        'El registro ha sido borrado satisfactoriamente.',
                        'success'
                        )
                    }
                })
            });
           
</script>

@endpush