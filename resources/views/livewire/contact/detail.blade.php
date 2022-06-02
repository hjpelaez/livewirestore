<div>
    <div>
        <form wire:submit.prevent='submit'>

            <div class="mb-4">
                <x-jet-label class="mb-2">{{ __('Extra') }}</x-jet-label>
                <textarea wire:model='extra' class="textarea w-full" rows='4' />
                </textarea>
                <x-jet-input-error class="mt-2" for='extra' />
            </div>

            <x-jet-button wire:click="$emit('stepEvent', 2)" type='button'>Anterior</x-jet-button>
            <x-jet-button class="float-right" type='submit'>Enviar</x-jet-button>
        </form>

    </div>
</div>