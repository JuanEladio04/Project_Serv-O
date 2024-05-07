<x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="sm:w-1/3 w-full p-0 m-5">

        <x-customUserForm>
            <div class="mb-4 text-sm color-ctext text-center">
                {{ '¿Olvidaste tu contraseña? No hay problema. Simplemente déjanos saber tu dirección de correo electrónico y te enviaremos un enlace de restablecimiento de contraseña por correo electrónico que te permitirá elegir una nueva.' }}
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <x-CustomInput label="Correo electrónico" name="email" type="email" value="{{ old('email') }}" />

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="accentButton cSubTitle mt-10">
                        Recuperar contraseña
                    </button>
                </div>
            </form>
        </x-customUserForm>
    </div>

</x-guest-layout>
