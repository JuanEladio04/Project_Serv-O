<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-customInputForm>

        <h1 class="text-4xl text-center">
            Iniciar sesión
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-wrapper mt-4">
                <input type="email" id="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username">
                <label for="email" for="email">Correo electrónico</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-wrapper mt-4">
                <input type="password" id="password" name="password" required autocomplete="current-password">
                <label for="password" for="password">Contraseña</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

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
        </form>
    </x-customInputForm>
</x-guest-layout>
