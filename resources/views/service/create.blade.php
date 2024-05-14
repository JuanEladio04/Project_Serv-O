<x-app-layout>

    <div class="flex justify-center items-center h-full">
        <a href="/" class="p-20">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-48</x-application-logo>
        </a>
    </div>

    <div class="w-full sm:w-1/2 mx-auto">
        <x-custom-form>

            <h1 class="text-4xl text-center">
                Registrar servicio
            </h1>

            <form method="POST" action="{{ route('service.store') }}" class="sm:p-4">
                @csrf

                <!-- Service Name -->
                <x-custom-input label="Nombre del servicio" name="name" type="text" value="{{ old('name') }}" />
                <!-- Service tecnic name -->
                <x-custom-input label="Nombre técnico del servicio" name="service_name" type="text"
                    value="{{ old('service_name') }}" />

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Registrar
                </button>

            </form>
        </x-custom-form>
    </div>

</x-app-layout>
