<div class="inline-block">
    <button class="accentButton" data-modal-target="delete-modal-{{ $command->id }}"
        data-modal-toggle="delete-modal-{{ $command->id }}">
        <span class="material-symbols-outlined">
            delete
        </span>
        Eliminar
    </button>

    <div id="delete-modal-{{ $command->id }}" tabindex="-1"
        class="deleteModal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="modal-div relative bg-cPrimary shadow text-center">
                <span class="material-symbols-outlined block text-7xl">
                    warning
                </span>
                <div class="p-1">
                    <p class="cSubTitle text-2xl">
                        ¿Estás seguro que deseas eliminar el comando seleccionado?
                    </p>
                </div>
                <div class="grid grid-cols-2 text-center">
                    <button class="secondaryButton" wire:click='performDelete'
                        data-modal-target="delete-modal-{{ $command->id }}"
                        data-modal-toggle="delete-modal-{{ $command->id }}">Eliminar</button>
                    <button class="accentButton" data-modal-target="delete-modal-{{ $command->id }}"
                        data-modal-toggle="delete-modal-{{ $command->id }}">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
