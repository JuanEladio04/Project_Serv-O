<x-guest-layout>

    <div class="sm:w-1/3 w-full p-0 m-5">
        <x-customUserForm>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <x-CustomInput label="Correo electrónico" name="email" type="email" value="{{ old('email', $request->email) }}" />

                <!-- Password -->
                <x-CustomInput label="Nueva contraseña" name="password" type="password" />

                <!-- Confirm Password -->
                <x-CustomInput label="Confirmar contraseña" name="password_confirmation" type="password" />


                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="accentButton cSubTitle mt-10">
                        Cambiar contraseña
                    </button>
                </div>
            </form>
        </x-customUserForm>
    </div>

</x-guest-layout>
