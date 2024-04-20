<x-app-layout>

    <section class="server bg-cPrimary mt-10">
        <article class="grid grid-cols-3 py-10 mx-20">
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
            <div class="mx-50 items-center gap-y-10">
                <livewire:ResourcesBar :progress="$server->getCpuUsage()" :name="'CPU'" lazy/>
                <livewire:ResourcesBar :progress="80" :name="'Memoria'" />
                <livewire:ResourcesBar :progress="64" :name="'GPU'" />
            </div>
        </article>
        <article>
            <h2 class="text-4xl">Servicios</h2>
        </article>
    </section>

</x-app-layout>
