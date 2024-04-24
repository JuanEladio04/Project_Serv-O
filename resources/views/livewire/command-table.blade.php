<div class="commandTable bg-cPrimary py-20 shadow-md">

    <div class="grid sm:grid-cols-2 mx-10 justify-center items-center">
        <div class="grid-cols-3">

            <div class="input-wrapper mt-4 m-7 inline-block w-1/2 col-span-2">
                <div class="relative z-0">
                    <input type="search" wire:model.blur='search'
                        class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                        placeholder=" " />
                    <label for="search"
                        class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-10 bg-cPrimary origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto mx-3">
                        Buscar
                    </label>
                </div>
            </div>

            <button class="secondaryButton col-span-1">
                Buscar
            </button>
        </div>

        <div class="text-right align-middle">
            <button class="secondaryButton" data-modal-target="createCommandModal"
                data-modal-toggle="createCommandModal">
                <span class="material-symbols-outlined">
                    add
                </span>
                Registrar comando
            </button>
        </div>
    </div>


    @if ($commands->count() > 0)
        <div class="tableContainer px-5 my-10">
            <table class="w-full">
                <tr class="bg-cSecondary color-cPrimary cSubTitle text-3xl">
                    <th>Nombre</th>
                    <th>Operación</th>
                    <th>Comando</th>
                    <th>Descripción</th>
                    <th>Operaciónes</th>
                </tr>
                @foreach ($commands as $command)
                    <tr>
                        <td>{{ $command->name }}</td>
                        <td>{{ $command->operation }}</td>
                        <td>{{ $command->command }}</td>
                        <td>{{ $command->description }}</td>
                        <td class="text-center">
                            <livewire:EditCommandModal :command="$command" />
                            <livewire:DeleteCommandModal :command="$command" />
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="m-10 block">
            {{ $commands->links() }}
        </div>
    @else
        <p class="text-center ">
            Este servicio no tiene comandos actualmente
        </p>
    @endif

    <livewire:CreateCommandModal :service="$service" />

</div>
