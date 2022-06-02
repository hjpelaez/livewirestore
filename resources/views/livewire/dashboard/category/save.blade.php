<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categorías') }}
    </h2>
</x-slot>
<div class="pb-12">

    <x-jet-form-section submit='submit'>

        <header class="text-gray-500 mb-12 pb-3 border-b-2">

            @slot('title')

            @if($category)

            <span class="uppercase text-base">{{ __('Editar la categoría') }}</span>
            <h1 class="font-bold text-4xl border-b pb-2">{{ $category->title }}</h1>

            @else

            <h1 class="text-4xl font-bold border-b pb-2">{{ __('Crear la categoría') }}</h1>

            @endif

            @endslot

            @slot('description')

            <p class="mt-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                voluptas harum repellendus nisi temporibus ullam molestias modi accusantium ipsam
                distinctio dignissimos maxime quasi cumque delectus deleniti sequi, aperiam, dolorum
                cupiditate!
            </p>

            @endslot



        </header>

        <article>

            @slot('form')

            <div class="col-span-6 mb-6">
                <x-jet-label class="mb-2">Título:</x-jet-label>
                <x-jet-input wire:model='title' type='text' class="w-full" />
                <x-jet-input-error for='title' class="mt-2" />
            </div>

            <div class="col-span-6 mb-6">
                <x-jet-label class="mb-2">Descripción:</x-jet-label>
                <x-jet-input wire:model='description' type='text' class="w-full" />
                <x-jet-input-error for='description' class="mt-2" />
            </div>

            <div class="col-span-6 mb-6">
                <x-jet-label class="mb-2">Imagen:</x-jet-label>
                <div class="flex items-center space-x-6 mt-4">
                    <div class="shrink-0">
                        @if ($image)

                        <img class="w-32 h-32 aspect-square rounded-full object-cover"
                            src="{{ $image->temporaryUrl() }}" alt="Current profile photo" />

                        @elseif($category && $category->image)

                        <img src="{{ asset($category->getImageUrl()) }}" alt=''
                            class='w-32 h-32 rounded-full object-cover'>

                        @else
                        <div class="h-32 w-32 text-gray-200 float-right">
                            {!! file_get_contents('svg/foto.svg') !!}
                        </div>
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

                    <div wire:loading wire:target="image">
                        <div class="flex items-center">
                            <span class=" h-8 w-8 animate-spin">
                                {!! file_get_contents('svg/loading.svg') !!}
                            </span>
                            <span class="ml-4">
                                Imagen cargando.
                            </span>
                        </div>

                    </div>

                </div>
                <x-jet-input-error for='image' class="mt-2" />

                @slot('actions')

                <x-jet-button wire:loading.attr="disabled" wire:target="submit, image"
                    class="bg-blue-500 hover:bg-blue-700">
                    Enviar
                </x-jet-button>

                @endslot

                <x-jet-action-message on='created'>
                    <div class="mt-12 p-4 text-lg text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        {!! file_get_contents('svg/pulgar-arriba.svg') !!} La categoría ha sido
                        creada satisfactoriamente.
                    </div>
                </x-jet-action-message>
                <x-jet-action-message on='updated'>
                    <div class="mt-12 p-4 text-lg text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        {!! file_get_contents('svg/pulgar-arriba.svg') !!} La categoría ha sido
                        editada satisfactoriamente.
                    </div>
                </x-jet-action-message>


            </div>


            @endslot



        </article>

    </x-jet-form-section>


    <x-jet-section-border />

    <a href="{{ route('d-category-index') }}">
        <x-jet-button class="bg-green-500 hover:bg-green-700">
            Volver a categorías
        </x-jet-button>
    </a>

</div>