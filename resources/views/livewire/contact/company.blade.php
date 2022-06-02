<div>
    <form wire:submit.prevent='submit'>
        <div class="mb-4">
            <x-jet-label class="mb-2">{{ __('Name') }}</x-jet-label>
            <x-jet-input wire:model='name' class="w-full" type='text' />
            <x-jet-input-error class="mt-2" for='name' />
        </div>

        <div class="mb-4">
            <x-jet-label class="mb-2">{{ __('Identificaction') }}</x-jet-label>
            <x-jet-input wire:model='identification' class="w-full" type='text' />
            <x-jet-input-error class="mt-2" for='identification' />
        </div>

        <div class="mb-4">
            <x-jet-label class="mb-2">{{ __('Email') }}</x-jet-label>
            <x-jet-input wire:model='email' class="w-full" type='email' />
            <x-jet-input-error class="mt-2" for='email' />
        </div>
        <div class="mb-4">
            <x-jet-label class="mb-2">{{ __('Choices') }}</x-jet-label>
            {{--
            <x-jet-input type='text' /> --}}
            <select wire:model='choices' class="select" name="" id="">
                <option value="">Select an option:</option>
                <option value="post">{{ __('Post') }}</option>
                <option value="advertising">{{ __('Advertising') }}</option>
                <option value="course">{{ __('Course') }}</option>
                <option value="video">{{ __('Video') }}</option>
                <option value="photo">{{ __('Photo') }}</option>
                <option value="other">{{ __('Other') }}</option>
            </select>
            <x-jet-input-error class="mt-2" for='choices' />
        </div>

        <div class="mb-4">
            <x-jet-label class="mb-2">{{ __('Extra') }}</x-jet-label>
            <x-jet-input wire:model='extra' class="w-full" type='text' />
            <x-jet-input-error class="mt-2" for='extra' />
        </div>

        <x-jet-button wire:click="$emit('stepEvent', 1)" type='button'>Anterior</x-jet-button>
        <x-jet-button class="float-right" type='submit'>Siguiente</x-jet-button>

    </form>
</div>