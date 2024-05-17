<x-app-layout>

    <div class="flex justify-center items-center h-full">
        <a href="/" class="p-20">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-48</x-application-logo>
        </a>
    </div>


    <div class="w-full sm:w-1/2 mx-auto">
        <x-custom-form>
            <h1 class="text-4xl text-center overflow-x-hidden overflow-y-hidden flex-wrap">
                Editar servidor: {{ $server->name }}
            </h1>

            <form method="POST" action="{{ route('server.update', [$server]) }}" class="sm:p-4">
                @csrf
                @method('PUT')

                <!-- Server Name -->
                <x-custom-input label="Nombre del servidor" name="name" type="text" value="{{ $server->name }}" />
                <!-- Server Direction -->
                <x-custom-input label="Dirección del servidor" name="server_dir" type="text" value="{{ $server->server_dir }}" />
                <!-- Server User Root -->
                <x-custom-input label="Usuario del servidor" name="user_root" type="text"
                    value="{{ $server->user_root }}" />
                <!-- Server Password -->
                <x-custom-input label="Contraseña del servidor" name="password" type="password"
                    value="{{ $server->password }}" />

                <!-- Server Description -->
                <div class="input-wrapper mt-7">
                    <div class="relative z-0">
                        <textarea cols="30" rows="10" id="description" name="description"
                            class="block p-5 resize-none w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" ">{{ $server->description }}</textarea>
                        <label for="description"
                            class="absolute m-2 bg-cPrimary text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Descripción
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Editar servidor
                </button>

            </form>
        </x-custom-form>
    </div>

</x-app-layout>
