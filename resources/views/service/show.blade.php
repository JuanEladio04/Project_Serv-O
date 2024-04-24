<x-app-layout>
    <div class="bg-cPrimary my-14 px-20 py-10">
        <div class="grid grid-cols-2 justify-center items-center">
            <p class="text-7xl cTitle">
                {{ $service->name }}
            </p>
            <div class="text-right">
                <x-dropdown align="right">
                    <x-slot name="trigger">
                        <button class="color-cText items-center justify-center text-xl">
                            <span class="material-symbols-outlined">
                                settings
                            </span>
                        </button>
                    </x-slot>

                    <x-slot name="content" contentClasses="overflow-y-auto h-40 bg-black">
                        <x-dropdown-link :href="route('service.edit', $service->id)">

                            <div class=" inline-flex items-center gap-3">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                                Editar servidor
                            </div>
                        </x-dropdown-link>
                        <x-dropdown-link :href="'#'" data-modal-target="delete-modal"
                            data-modal-toggle="delete-modal">
                            <div class=" inline-flex items-center gap-3 color-cAccent">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                Eliminar servidor
                            </div>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        <p class="text-4xl cSubTitle mt-5">
            {{ $service->service_name }}
        </p>
    </div>

    <livewire:DeleteServiceModal :service="$service" />   

</x-app-layout>
