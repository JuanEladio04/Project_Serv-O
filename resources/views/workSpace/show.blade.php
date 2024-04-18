<x-app-layout>
    <div class="m-10">
        <div class="grid sm:grid-cols-2 items-center">
            <h1 class="text-4xl sm:text-5xl w-full overflow-hidden my-5 p-1">
                {{ $workSpace->name }}
            </h1>
            @if (Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role != 'reader')
                <div class="sm:hidden block text-right">
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <button class="color-cText items-center justify-center text-xl">
                                <span class="material-symbols-outlined">
                                    settings
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content" contentClasses="overflow-y-auto h-40 bg-black">
                            <x-dropdown-link data-modal-target="add-user-to-wk-modal"
                                data-modal-toggle="add-user-to-wk-modal">
                                <div class=" inline-flex items-center gap-3">
                                    <span class="material-symbols-outlined">
                                        group
                                    </span>
                                    Añadir usuario
                                </div>
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('workSpace.edit', $workSpace->id)">

                                <div class=" inline-flex items-center gap-3">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                    Editar espacio de trabajo
                                </div>
                            </x-dropdown-link>
                            <x-dropdown-link data-modal-target="insertServerModal"
                                data-modal-toggle="insertServerModal">
                                <div class=" inline-flex items-center gap-3">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                    Añadir servidor
                                </div>
                            </x-dropdown-link>
                            @if (Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role == 'creator')
                                <x-dropdown-link data-modal-target="delete-modal" data-modal-toggle="delete-modal">
                                    <div class=" inline-flex items-center gap-3 color-cAccent">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                        Eliminar espacio de trabajo
                                    </div>
                                </x-dropdown-link>
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="text-right hidden sm:block">
                    <button class="secondaryButton" data-modal-target="add-user-to-wk-modal"
                        data-modal-toggle="add-user-to-wk-modal">
                        <span class="material-symbols-outlined">
                            group
                        </span>
                        Añadir usuario
                    </button>
                    <a href="{{ route('workSpace.edit', $workSpace->id) }}">
                        <button class="secondaryButton">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            Editar espacio de trabajo
                        </button>
                    </a>
                    <button class="secondaryButton" data-modal-target="insertServerModal"
                        data-modal-toggle="insertServerModal">
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        Añadir servidor
                    </button>
                    @if (Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role == 'creator')
                        <button class="accentButton" data-modal-target="delete-modal" data-modal-toggle="delete-modal">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Eliminar espacio de trabajo
                        </button>
                    @endif
                </div>
            @endif
        </div>
        <p class="sm:block hidden">
            {{ $workSpace->description }}
        </p>
    </div>

    <livewire:DeleteWorkSpaceModal :workSpace="$workSpace" />
    <livewire:AddUserToWKModal :workSpace="$workSpace" />
    <livewire:CreateServerModal :workSpace="$workSpace" />

    <div class="grid sm:grid-cols-3 sm:mx-20">
        @foreach ($servers as $server)
            <livewire:ServerTag :server="$server" />
        @endforeach
    </div>

</x-app-layout>
