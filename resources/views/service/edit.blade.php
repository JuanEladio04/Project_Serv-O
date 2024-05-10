<x-app-layout>

    <div class="flex justify-center items-center h-full">
        <a href="/" class="p-20">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-48</x-application-logo>
        </a>
    </div>


    <div class="w-full sm:w-1/2 mx-auto">
        <x-customForm>
            <h1 class="text-4xl text-center overflow-x-hidden overflow-y-hidden flex-wrap">
                Editar servicio: {{ $service->name }}
            </h1>

            <form method="POST" action="{{ route('service.update', [$service]) }}" class="sm:p-4">
                @csrf
                @method('PUT')

                <!-- Service Name -->
                <x-CustomInput label="Nombre del servicio" name="name" type="text" value="{{ $service->name }}" />
                <!-- Service tecnic name -->
                <x-CustomInput label="Nombre técnico del servicio" name="service_name" type="text"
                    value="{{ $service->service_name }}" />

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Editar servicio
                </button>

            </form>
        </x-customForm>
    </div>

</x-app-layout>
