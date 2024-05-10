<div>
    <div id="insertServerModal" tabindex="-1"  wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-cPrimary rounded-2xl shadow text-center">
                <div class="w-full text-right pt-10 pr-10 m-none">
                    <button class="color-cBackground" data-modal-target="insertServerModal"
                        data-modal-toggle="insertServerModal">
                        <span class="material-symbols-outlined text-4xl">
                            close
                        </span>
                    </button>
                </div>
                <x-custom-user-form>
                    <h1 class="text-center text-3xl">Nuevo servidor</h1>

                    <x-CustomInput label="Nombre del servidor" name="name" type="text" wireModel="name" />
                    <x-CustomInput label="Dirección del servidor" name="direction" type="text"
                        wireModel="direction" />
                    <x-CustomInput label="Usuario del servidor" name="user" type="text" wireModel="user" />
                    <x-CustomInput label="Contraseña del usuario del servidor" name="password" type="password"
                        wireModel="password" />

                    <div class="input-wrapper mt-7 text-left">
                        <div class="relative z-0">
                            <textarea cols="30" rows="10" id="description" name="description" wire:model.lazy='description'
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
                        <button class="accentButton" wire:click='performInsert()' type="button">
                            Crear servidor
                        </button>
                    </div>
                </x-custom-user-form>
            </div>
        </div>
    </div>

</div>
