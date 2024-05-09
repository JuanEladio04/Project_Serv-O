<x-app-layout>
    <div class="bg-cPrimary my-14 sm:px-20 px-10 py-10 shadow-md">
        <div class="grid items-center">
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
                                Editar servicio
                            </div>
                        </x-dropdown-link>
                        <x-dropdown-link :href="'#'" data-modal-target="delete-modal"
                            data-modal-toggle="delete-modal">
                            <div class=" inline-flex items-center gap-3 color-cAccent">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                Eliminar servicio
                            </div>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <h1 class="text-4xl sm:text-5xl w-full overflow-hidden my-5 p-1">
                {{ $service->name }}
            </h1>
        </div>
        <p class="text-4xl cSubTitle mt-5">
            {{ $service->service_name }}
        </p>
    </div>

    <livewire:CommandTable :service="$service" />
    <livewire:DeleteServiceModal :service="$service" />

</x-app-layout>
