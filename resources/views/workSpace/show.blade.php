<x-app-layout>

    <div class="m-10">
        <div class="grid grid-cols-2 inline-flex items-center">
            <h1 class="text-4xl sm:text-5xl w-full overflow-hidden my-5">
                {{ $workSpace->name }}
            </h1>
            <div class="text-right">
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

    <div>

    </div>
</x-app-layout>
