<x-app-layout>

    <section class="server bg-cPrimary mt-10">
        <article class="grid grid-cols-3 py-10">
            {{-- @if (Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role != 'reader') --}}
                <div class="block text-right col-span-3">
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <button class="color-cText items-center justify-center text-xl">
                                <span class="material-symbols-outlined">
                                    settings
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content" contentClasses="overflow-y-auto h-40 bg-black">
                            <x-dropdown-link :href="route('server.edit', $server->id)">

                                <div class=" inline-flex items-center gap-3">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                    Editar servidor
                                </div>
                            </x-dropdown-link>
                            {{-- @if (Auth::user()->workSpaces->find($workSpace->id)->pivot->wk_role == 'creator') --}}
                                <x-dropdown-link :href="'#'" data-modal-target="delete-modal" data-modal-toggle="delete-modal">
                                    <div class=" inline-flex items-center gap-3 color-cAccent">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                        Eliminar servidor
                                    </div>
                                </x-dropdown-link>
                            {{-- @endif --}}
                        </x-slot>
                    </x-dropdown>
                </div>
                <h1 class="col-span-2 text-6xl">
                    {{ $server->name }}
                </h1>
                <div class="col-span-1 flex justify-end items-center">
                    <livewire:StatusBall :$server :key="$server->id" lazy />
                </div>
                <p class="col-span-3 mt-5 overflow-x-hidden overflow-y-hidden text-cText text-lg">
                    {{ $server->description }}
                </p>
        </article>
        <article>
            <h2 class="text-4xl">Recursos</h2>
            <livewire:ServerResources :server="$server" lazy/>
        </article>
        <article>
            <h2 class="text-4xl">Servicios</h2>
        </article>
    </section>

    <livewire:DeleteServerModal :server="$server" />   

</x-app-layout>
