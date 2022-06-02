<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categorías') }}
    </h2>
</x-slot>

<div class="">

    <header class="text-gray-500 mb-12 pb-2 border-b">
        <h1 class="text-2xl font-bold">Listado de todas las categorías</h1>
    </header>

    <article>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-t">
            <div class="p-4 flex justify-between">

                {{-- Filtro de cantidad --}}
                <div class="flex items-center">
                    Mostrar
                    <select wire:model="quantity" class="select mx-2">
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
                        <div class="h-5 w-5 text-gray-400">
                            {!! file_get_contents('svg/lupa.svg') !!}
                        </div>
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

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                <thead
                    class="text-md text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3 border-r">
                            Imagen
                        </th>

                        <th wire:click="order('id')" scope="col" class="px-6 py-3 w-28 border-r">
                            ID
                            @if ($sort == 'id')

                            @if ($direction == 'asc')
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/numero-ascendente.svg') !!}
                            </div>

                            @else
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/numero-descendente.svg') !!}
                            </div>
                            @endif

                            @else
                            <div class="h-3 w-3 text-gray-400 float-right">
                                {!! file_get_contents('svg/filtro.svg') !!}
                            </div>
                            @endif

                        </th>

                        <th wire:click="order('title')" scope="col" class="px-6 py-3 w-48 border-r">
                            Nombre
                            @if ($sort == 'title')

                            @if ($direction == 'asc')
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/letras-ascendente.svg') !!}
                            </div>
                            @else
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/letras-descendente.svg') !!}
                            </div>
                            @endif

                            @else
                            <div class="h-3 w-3 text-gray-400 float-right"> {!!
                                file_get_contents('svg/filtro.svg') !!}
                            </div>
                            @endif
                        </th>

                        <th wire:click="order('description')" scope="col"
                            class="px-6 py-3 border-r">
                            Descripción
                            @if ($sort == 'description')

                            @if ($direction == 'asc')
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/letras-ascendente.svg') !!}
                            </div>
                            @else
                            <div class="h-4 w-4 text-gray-400 float-right">
                                {!! file_get_contents('svg/letras-descendente.svg') !!}
                            </div>
                            @endif

                            @else
                            <div class="h-3 w-3 text-gray-400 float-right"> {!!
                                file_get_contents('svg/filtro.svg') !!}
                            </div>
                            @endif
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="2">
                            Acciones
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ( $categories as $category)

                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td scope="row" class="px-6 py-3 border-r">
                            @if ($category->image)
                            <img src='{{ $category->getImageUrl() }}' alt=''
                                class='rounded-full w-32 object-cover aspect-square border'>
                            @else
                            <div class="h-32 w-32 text-gray-200 float-right">
                                {!! file_get_contents('svg/foto.svg') !!}
                            </div>
                            @endif

                        </td>

                        <td scope="row"
                            class="px-6 py-3 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                            {{ $category->id }}
                        </td>

                        <td scope="row"
                            class="px-6 py-3 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                            {{ $category->title }}<br>
                            {{ $category->slug }}
                        </td>

                        <td class="px-6 py-4 border-r">
                            {{ $category->description }}
                        </td>

                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('d-category-edit', $category) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline inline-flex w-8 h-8">
                                {!! file_get_contents('svg/editar.svg') !!}
                            </a>
                        </td>

                        <td class="px-6 py-3 text-center">
                            <a wire:click="$emit('deleteCategory', {{$category->id}})" class=" font-medium text-red-600 dark:text-red-500 hover:underline inline-flex
                                cursor-pointer w-8 h-8">
                                {!! file_get_contents('svg/eliminar.svg') !!}
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