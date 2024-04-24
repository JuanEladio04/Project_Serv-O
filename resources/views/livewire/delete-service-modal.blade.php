<div class="inline">
    <x-delete-modal>
        <div class="p-1">
            <p class="cSubTitle text-2xl">
                ¿Estás seguro que deseas eliminar el servicio?
            </p>
        </div>
        <div class="grid grid-cols-2 text-center">
            <button class="secondaryButton" wire:click='performDelete'>Eliminar</button>
            <button class="accentButton" data-modal-target="delete-modal"
                data-modal-toggle="delete-modal">Cancelar</button>
        </div>
    </x-delete-modal>
</div>
