<div x-data="{ showModal: false }" class="inline-block">
    <button @click="showModal = true" class="accentButton">
        <span class="material-symbols-outlined">
            delete
        </span>
        Eliminar
    </button>

    <div x-show="showModal" @click.away="showModal = false" id="delete-modal-{{ $user->id }}" tabindex="-1"
        class="deleteModal fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="modal-div relative bg-cPrimary shadow text-center">
                <span class="material-symbols-outlined block text-7xl">
                    warning
                </span>
                <div class="p-1">
                    <p class="cSubTitle text-2xl">
                        ¿Estás seguro que deseas eliminar el usuario seleccionado?
                    </p>
                </div>
                <div class="grid grid-cols-2 text-center">
                    <button @click="showModal = false" wire:click="performDelete" class="secondaryButton">Eliminar</button>
                    <button @click="showModal = false" class="accentButton">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
