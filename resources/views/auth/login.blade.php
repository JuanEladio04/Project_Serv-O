<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="sm:w-1/3 w-full p-0 m-5">
        <x-customUserForm>
            <h1 class="text-4xl text-center">
                INICIAR SESIÓN
            </h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-wrapper mt-4">
                    <div class="relative z-0">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Correo electrónico
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-wrapper mt-4">
                    <div class="relative z-0">
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Contraseña
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
        </x-customUserForm>
    </div>

</x-guest-layout>
