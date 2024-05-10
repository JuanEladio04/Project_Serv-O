<div>
    <div id="add-user-to-wk-modal" tabindex="-1" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-cPrimary rounded-2xl shadow text-center py-5">
                <h1 class="text-2xl m-4">Usuarios en el espacio de trabajo</h1>
                <div class="max-h-80 overflow-y-scroll">
                    @foreach ($users as $user)
                        @if (Auth::user()->id != $user->id)
                            <div class="grid grid-cols-3 items-center">
                                <p>
                                    {{ $user->name }}
                                </p>
                                <select name="wkRoleSelect_{{ $user->id }}" id="wkRoleSelect_{{ $user->id }}"
                                    wire:model="selectedRoles.{{ $user->id }}"
                                    wire:change="updateRole({{ $user->id }})"
                                    @if ($selectedRoles[$user->id] == 'creator') disabled @endif>
                                    @if ($selectedRoles[$user->id] == 'creator')
                                        <option value="creator"> Creador </option>
                                    @endif
                                    <option value="editor">Editor
                                    </option>
                                    <option value="reader">Lector
                                    </option>
                                </select>
                                @if ($selectedRoles[$user->id] != 'creator')
                                    <button class="color-cBackground"
                                        wire:click='removeUserFromWK({{ $user }})'>
                                        <span class="material-symbols-outlined">
                                            close
                                        </span>
                                    </button>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                @isset($wkStatus)
                    <p class="color-cAccent my-2">
                        {{ $wkStatus }}
                    </p>
                @endisset
                <!-- Email Address -->
                <div class="input-wrapper mt-4 text-left m-7">
                    <div class="relative z-0">
                        <input type="email" wire:model.blur='email'
                            class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-10 bg-cPrimary origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto mx-3">
                            Correo electrónico
                        </label>
                    </div>
                </div>
                <button class="secondaryButton" wire:click='addUser'>
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    Añadir usuario
                </button>
            </div>
        </div>
    </div>
