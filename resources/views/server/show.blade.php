<x-app-layout>

    <section class="server bg-cPrimary mt-10">
        <article class="grid grid-cols-3 py-10">
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
            <livewire:ServerResources :server="$server"/>
        </article>
        <article>
            <h2 class="text-4xl">Servicios</h2>
        </article>
    </section>

</x-app-layout>
