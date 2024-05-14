<div>
    <div id="addServiceToServerModal" tabindex="-1" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative bg-cPrimary rounded-2xl shadow p-4 w-full max-w-lg max-h-full">
            <div class="relative text-center py-5">
                <h3 class="text-4xl">
                    Lista de servicios
                </h3>

                <div class="mx-10 my-5 flex justify-center">
                    <x-custom-input class="flex-grow" label="Buscar" name="seach" type="text" wireModel="search" />
                    <button class="secondaryButton" wire:click='lookUp'>
                        Buscar
                    </button>
                </div>

                <div class="px-14 my-10 max-h-64 justify-center overflow-y-scroll">
                    @foreach ($services as $service)
                        <div class="mt-8 grid grid-cols-2 justify-center">
                            <p class="text-left text-2xl justify-center">
                                {{ $service->name }}
                            </p>
                            <div class="text-right">
                                <button class="secondaryButton" wire:click='addServiceToServer({{ $service }})'>
                                    <span class="material-symbols-outlined text-2xl font-bold">
                                        add
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @isset($statusMessage)
                    <p class="color-cAccent my-2">
                        {{ $statusMessage }}
                    </p>
                @endisset
                <button class="accentButton" data-modal-target="addServiceToServerModal"
                    data-modal-toggle="addServiceToServerModal">
                    Cerrar
                </button>

            </div>
        </div>
    </div>
