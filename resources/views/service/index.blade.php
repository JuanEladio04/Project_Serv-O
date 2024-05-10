<x-app-layout>
    <div class="text-right block sm:m-14 m-8 gap-10">
        <a href="{{ route('service.create') }}">
            <button class="secondaryButton">
                <span class="material-symbols-outlined">
                    add
                </span>
                Añadir servicio
            </button>
        </a>
    </div>

    <div class="grid sm:grid-cols-4 grid-cols-1 sm:mx-20 mx-0 gap-y-14 gap-x-10">
        @foreach ($services as $service)
            <livewire:ServiceTag :service="$service">
        @endforeach
    </div>

    <div class="m-10 block">
        {{ $services->links() }}
    </div> 
</x-app-layout>
