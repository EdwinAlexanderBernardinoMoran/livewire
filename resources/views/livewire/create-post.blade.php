<div>
    {{-- Success is as dangerous as failure. --}}
    <x-danger-button wire:click="$set('open', true)">Crear nuevo Post</x-danger-button>

    {{-- Modal --}}
    <x-dialog-modal wire:model='open'>
        <x-slot name="title">Nuevo Post</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label>Titulo del Post</x-label>
                <x-input type="text" class="w-full" placeholder="Titulo del Post ..." wire:model='title'></x-input>
                <x-input-error for="title"></x-input-error>
            </div>

            <div class="mb-4">
                <x-label>Contenido del Post</x-label>
                <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" rows="6" wire:model='content'></textarea>
                <x-input-error for="content"></x-input-error>
            </div>

            {{-- <div class="mb-4">
                <x-input type='file' wire:model='image'></x-input>
                <x-input-error for="image"></x-input-error>
            </div> --}}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mr-1" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            {{-- <x-danger-button wire:click='save' wire:loading.attr='disable'  wire:target='save' class="disabled:opacity-25"> --}}
            <x-danger-button wire:click='save' wire:loading.remove wire:target='save'>
                Crear Post
            </x-danger-button>

            <span wire:loading wire:target='save'>Cargando ...</span>

        </x-slot>
    </x-dialog-modal>

</div>
