<x-app-layout>
    <div class="m-10">
        <div class="grid sm:grid-cols-2 inline-flex items-center">
            <h1 class="text-4xl sm:text-5xl w-full overflow-hidden my-5 p-1">
                {{ $workSpace->name }}
            </h1>
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
                        <x-dropdown-link :href="route('workSpace.edit', $workSpace->id)">
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
                        <x-dropdown-link :href="route('workSpace.edit', $workSpace->id)">
                            <div class=" inline-flex items-center gap-3">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                                Añadir servidor
                            </div>
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('workSpace.edit', $workSpace->id)">
                            <div class=" inline-flex items-center gap-3 color-cAccent">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                Eliminar espacio de trabajo
                            </div>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="text-right hidden sm:block">
                <button class="secondaryButton">
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
                <button class="secondaryButton">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                    Añadir servidor
                </button>
                <button class="accentButton">
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                    Eliminar espacio de trabajo
                </button>
            </div>
        </div>
        <p class="sm:block hidden">
            {{ $workSpace->description }}
        </p>
    </div>
</x-app-layout>
