<x-guest-layout>
    <div class="sm:w-1/2 w-full p-0 m-5">

        <x-customUserForm>
            <h1 class="text-4xl text-center">
                REGISTRO
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid sm:grid-cols-2 sm:gap-5">
                    <!-- Name -->
                    <div class="input-wrapper mt-6">
                        <div class="relative z-0">
                            <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus
                                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                                placeholder=" " />
                            <label for="name"
                                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Nombre
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- LastName -->
                    <div class="input-wrapper mt-6">
                        <div class="relative z-0">
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                                placeholder=" " />
                            <label for="last_name"
                                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Apellidos
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>

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
                        <input type="password" id="password" name="password"
                            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Contraseña
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="input-wrapper mt-6">
                    <div class="relative z-0">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="password_confirmation"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Repetir contraseña
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="grid sm:grid-cols-2 gap-5 items-baseline">
                    <div class="input-wrapper mt-6">
                        <div class="relative z-0">
                            <input type="number" id="phone_number" name="phone_number"
                                value="{{ old('phone_number') }}"
                                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                                placeholder=" " />
                            <label for="phone_number"
                                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Número de teléfono
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>

                    <!-- birth_date -->
                    <div class="input-wrapper mt-6">
                        <div class="input-wrapper mt-6">
                            <div class="relative z-0">
                                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                                    class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                                    placeholder=" " />
                                <label for="birth_date"
                                    class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                    Fecha de nacimiento
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>
                    </div>
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
