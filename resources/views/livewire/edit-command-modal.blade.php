<div x-data="{ showModal: false }" class="inline-block">
    <button @click="showModal = true" class="secondaryButton">
        <span class="material-symbols-outlined">
            edit
        </span>
        Editar
    </button>

    <div x-show="showModal" @click.away="showModal = false" id="edit-modal-{{ $command->id }}" tabindex="-1"
        class="editCommandModal fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-800 bg-opacity-50">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-cPrimary rounded-2xl shadow text-center">
                <div class="w-full text-right pt-10 pr-10 m-none">
                    <button @click="showModal = false" class="color-cBackground">
                        <span class="material-symbols-outlined text-4xl">
                            close
                        </span>
                    </button>
                </div>
                <x-custom-user-form>
                    <h1 class="text-center text-3xl">Editar comando: {{ $command->name }}</h1>

                    <x-CustomInput label="Nombre del comando" name="name" type="text" wireModel="name" />
                    <x-CustomInput label="Comando" name="commandStr" type="text" wireModel="commandStr" />
                    <div class="text-left mt-5">
                        <label for="operation" class="cSubTitle color-cBackground text-xl">Selecciona el tipo
                            de operación</label>
                        <select id="operation" name="operation" class="text-cText text-md rounded-lg cSubTitle"
                            wire:model="operation">
                            <option selected>Selecciona el tipo de operacion</option>
                            <option value="operation">Operación</option>
                            <option value="install">Instalador</option>
                            <option value="uninstall">Desinstalador</option>
                        </select>
                        <x-input-error :messages="$errors->get('operation')" class="mt-2" />
                    </div>

                    <div class="input-wrapper mt-7 text-left">
                        <div class="relative z-0">
                            <textarea cols="30" rows="10" id="description" name="description" wire:model='description'
                                class="block p-3 resize-none w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                                placeholder=" "></textarea>
                            <label for="description"
                                class="absolute m-2 bg-cPrimary text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-50 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Descripción
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    @isset($statusMessage)
                        <p class="color-cAccent">
                            {{ $statusMessage }}
                        </p>
                    @endisset
                    <div class=" mt-10">
                        <button class="accentButton" wire:click='performUpdate' type="button">
                            Editar comando
                        </button>
                    </div>
                </x-custom-user-form>
            </div>
        </div>
    </div>
</div>
