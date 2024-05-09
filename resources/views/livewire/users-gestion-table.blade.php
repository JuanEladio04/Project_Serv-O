<div class="gestionTable bg-cPrimary py-10 sm:px-10 px-5">

    <div class="input-wrapper mt-4 sm:m-7 inline-block sm:w-1/4 w-3/4">
        <div class="relative z-0">
            <input type="search" wire:model.live='search'
                class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" " />
            <label for="search"
                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-10 bg-cPrimary origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto mx-3">
                Buscar
            </label>
        </div>
    </div>

    @if ($users->count() > 0)
        <div class="tableContainer px-5 my-10">
            <table class="w-full">
                <tr class="bg-cSecondary color-cPrimary cSubTitle text-3xl">
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo electrónico</th>
                    <th>Número de teléfono</th>
                    <th>Fecha de nacimiento</th>
                    <th>Rol</th>
                    <th>Operaciones</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->phone_number }}
                        </td>
                        <td>
                            {{ $user->birth_date }}
                        </td>
                        <td>
                            {{ $user->role }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}">
                                <button class="secondaryButton">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                    Editar
                                </button>
                            </a>
                            <button class="accentButton">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <p>
            No hay usuarios actualmente
        </p>
    @endif
</div>
