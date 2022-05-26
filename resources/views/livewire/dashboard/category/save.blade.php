<div class="pb-12">
    <header class="text-gray-500 mb-12 pb-3 border-b-2">

        @if($category)
        <span class="uppercase text-xs">Editar la categoría</span>
        <h1 class="text-2xl font-bold">{{ $category->title }}</h1>
        @else
        <h1 class="text-2xl font-bold">Crear una categoría</h1>
        @endif

    </header>

    <article>


        <form wire:submit.prevent='submit'>

            <div class="mb-6">
                <x-jet-label class="mb-2">Título:</x-jet-label>
                <x-jet-input wire:model='title' type='text' class="w-full" />
                <x-jet-input-error for='title' class="mt-2" />
            </div>

            <div class="mb-6">
                <x-jet-label class="mb-2">Descripción:</x-jet-label>
                <x-jet-input wire:model='description' type='text' class="w-full" />
                <x-jet-input-error for='description' class="mt-2" />
            </div>

            <x-jet-label class="mb-2">Imagen:</x-jet-label>
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    @if ($image)

                    <img class="w-16 h-16 aspect-square rounded-full object-cover"
                        src="{{ $image->temporaryUrl() }}" alt="Current profile photo" />

                    @elseif($category && $category->image)

                    <img src="{{ asset($category->getImageUrl()) }}" alt=''
                        class='w-16 h-16 rounded-full object-cover'>

                    @else
                    <img src="{{ asset('images/foto.svg') }}" alt=''
                        class='w-16 h-16 rounded-full object-cover'>
                    @endif

                </div>

                <label class="block">
                    <span class="sr-only">Seleccione una imagen.</span>
                    <input wire:model='image' type="file" class="block w-full text-sm text-slate-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0
                  file:text-sm file:font-semibold
                  file:bg-blue-50 file:text-blue-700
                  hover:file:bg-blue-100
                " />
                </label>



                <i wire:loading wire:target="image" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin inline"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg> Imagen cargando.
                </i>

            </div>
            <x-jet-input-error for='image' class="mt-2" />

            <x-jet-button wire:loading.attr="disabled" wire:target="submit, image"
                class="bg-blue-500 hover:bg-blue-700 mt-12">Enviar</x-jet-button>

        </form>

        <x-jet-action-message on='created'>
            <div class="my-12 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium mx-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 inline" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </span> La categoría ha sido creada
                satisfactoriamente.
            </div>
        </x-jet-action-message>
        <x-jet-action-message on='updated'>
            <div class="my-12 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium mx-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 inline" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </span> La categoría ha sido editada
                satisfactoriamente.
            </div>
        </x-jet-action-message>

        <hr class="my-12">

        <a href="{{ route('d-category-index') }}">
            <x-jet-button class="bg-green-500 hover:bg-green-700">Volver a
                categorías
            </x-jet-button>
        </a>

    </article>

</div>