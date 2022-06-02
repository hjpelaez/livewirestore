<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacto') }}
        </h2>
    </x-slot>

    <div class="mt-8">

        <header class="text-gray-500 mb-12 pb-2 border-b text-center">
            <h1 class="text-2xl font-bold">{{ __('Formulario de Contacto') }}</h1>
        </header>

        @if($step !=4)
        <p class="max-w-screen-md mx-auto text-center text-gray-500 md:text-lg">
            Por favor rellena todos los campos y envía el formulario.<br>
            En breve nos pondremos en contacto contigo.
        </p>
        @endif

    </div>



    <div class="text-gray-600 mt-12">
        <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto">

            @if($step !=4)
            <div x-data="{ activo:@entangle('step') }" class="flex flex-wrap mx-auto">
                <a class="step" :class="{'step-active': activo == 1 }">
                    STEP 1
                </a>
                <a class="step" :class="{'step-active': parseInt(activo) == 2 }"">
                    STEP 2
                </a>
                <a class=" step" :class="{'step-active': activo == 3 }">
                    STEP 3
                </a>
            </div>
            @endif


            <div class="flex flex-col w-2/3 mx-auto ">
                <div class="py-6 bg-white sm:py-8 lg:py-12">
                    <div class="px-4 mx-auto max-w-screen-2xl md:px-8 mt-6">


                        @if ($step == 1)

                        <!-- form - start -->
                        <form wire:submit.prevent='submit'>
                            <div class="mb-4">
                                <x-jet-label class="mb-2">{{ __('Subject') }}</x-jet-label>
                                <x-jet-input wire:model='subject' class="w-full" type='text' />
                                <x-jet-input-error class="mt-2" for='subject' />
                            </div>

                            <div class="mb-4">
                                <x-jet-label class="mb-2">{{ __('Type') }}</x-jet-label>
                                {{--
                                <x-jet-input type='text' /> --}}
                                <select wire:model='type' class="select" name="" id="">
                                    <option value="">Select an option:</option>
                                    <option value="company">{{ __('Company') }}</option>
                                    <option value="person">{{ __('Person') }}</option>
                                </select>
                                <x-jet-input-error class="mt-2" for='type' />
                            </div>

                            <div class="mb-4">
                                <x-jet-label class="mb-2">{{ __('Message') }}</x-jet-label>
                                <textarea wire:model='message' class="textarea w-full" /></textarea>
                                <x-jet-input-error for='message' />
                            </div>

                            <x-jet-button class="float-right" type='submit'>Siguiente</x-jet-button>
                        </form>
                        <!-- form - end -->

                        @elseif($step == 2.1)

                        @livewire('contact.company')

                        @elseif($step == 2.2)

                        @livewire('contact.person')

                        @elseif($step == 3)

                        @livewire('contact.detail')

                        @else

                        <p class="text-center text-xl"> Gracias por rellenar el formulario. <br>
                            Pronto nos pondremos en contacto
                        </p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>