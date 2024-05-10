<x-guest-layout>
    <div class="sm:w-1/2 w-full p-0 m-5">

        <x-customUserForm>
            <h1 class="text-4xl text-center">
                REGISTRO
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid sm:grid-cols-2 sm:gap-5">
                    <x-CustomInput label="Nombre" name="name" type="text" value="{{ old('name') }}" />

                    <x-CustomInput label="Apellidos" name="last_name" type="text" value="{{ old('last_name') }}" />
                </div>

                <x-CustomInput label="Correo electrónico" name="email" type="email" value="{{ old('email') }}" />

                <x-CustomInput label="Contraseña" name="password" type="password" />

                <x-CustomInput label="Repetir contrseña" name="password_confirmation" type="password" />

                <div class="grid sm:grid-cols-2 gap-5 items-baseline">

                    <x-CustomInput label="Numero de teléfono" name="phone_number" type="number"
                        value="{{ old('phone_number') }}" />

                    <x-CustomInput label="Fecha de nacimiento" name="birth_date" type="date"
                        value="{{ old('birth_date') }}" />
                </div>

                <div class="flex items-center justify-center mt-6">
                    <a href="{{ route('login') }}">
                        {{ '¿Ya estás registrado?' }}
                    </a>
                </div>

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Registrarse
                </button>
            </form>
        </x-customUserForm>
    </div>
</x-guest-layout>
