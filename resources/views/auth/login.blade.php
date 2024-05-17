<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="sm:w-1/3 w-full p-0 m-5">
        <x-custom-user-form>
            <h1 class="text-4xl text-center">
                INICIAR SESIÓN
            </h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <x-custom-input label="Correo electrónico" name="email" type="email" value="{{ old('email') }}" />

                <x-custom-input label="Contraseña" name="password" type="password" />

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded" name="remember">
                        <span class="ms-2 color-cBackground text-lg">{{ 'Recuérdame' }}</span>
                    </label>
                </div>

                <div class="mt-4 grid grid-cols-2">
                    <a href="{{ route('register') }}">
                        {{ __('¿No tienes cuenta?') }}
                    </a>
                    @if (Route::has('password.request'))
                        <a class="text-end" href="{{ route('password.request') }}">
                            {{ __('Has olvidado tu contraseña?') }}
                        </a>
                    @endif
                </div>
                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Iniciar Sesión
                </button>

                <a href="{{ route('auth.google') }}">
                    <button type="button" class="bg-Primary color-cText border-2 text-2xl w-full cSubTitle mt-10">
                        <img src="/img/externalIcons/googleIcon.png" alt="Logo de google" class="inline w-14">
                        Iniciar Sesión con Google
                    </button>
                </a>
            </form>
        </x-custom-user-form>
    </div>

</x-guest-layout>
