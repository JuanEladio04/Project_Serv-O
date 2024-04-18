<x-app-layout>

    <div class="flex justify-center items-center h-full">
        <a href="/" class="p-20">
            <x-application-logo/>
        </a>
    </div>
    

    <div class="w-full sm:w-1/2 mx-auto">
        <x-customForm>

            <h1 class="text-4xl text-center">
                Nuevo Espacio de Trabajo
            </h1>

            <form method="POST" action="{{ route('workSpace.store') }}" class="sm:p-4">
                @csrf
                <!-- WorkSpace Name -->
                <x-CustomInput label="Nombre del espacio de trabajo" name="name" type="text" value="{{ old('name') }}" />


                <!-- WorkSpace Description -->
                <div class="input-wrapper mt-7">
                    <div class="relative z-0">
                        <textarea cols="30" rows="10" id="description" name="description"
                            value="{{ old('description') }}"
                            class="block resize-none py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" "></textarea>
                        <label for="description"
                            class="absolute m-2 bg-cPrimary text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Descripción
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Crear espacio de trabajo
                </button>

            </form>
        </x-customForm>
    </div>

</x-app-layout>
