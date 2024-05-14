<section>
    <header>
        <h2 class="text-lg font-medium color-cText">
            {{ __('Información del perfil') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <x-custom-input label="Nombre" name="name" type="text" value="{{ old('name', $user->name) }}" />
        <x-custom-input label="Apellidos" name="last_name" type="text" value="{{ old('name', $user->last_name) }}" />

        <div>
            <x-custom-input label="Email" name="email" type="email" value="{{ old('name', $user->email) }}" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2  text-cBackground">
                        Tu email no está verificado.

                        <button type="submit" class="secondaryButton" form="send-verification">
                            Click aqui para reenviar email de verificación.
                        </button>
                    </p>

                    @if (session('verificationStatus') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-cSecondary">
                            Un correo de verificación ha sido enviado a tu correo electrónico.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <x-custom-input label="Número de teléfono" name="phone_number" type="number" value="{{ old('name', $user->phone_number) }}" />
        <x-custom-input label="Fecha de nacimiento" name="birth_date" type="date" value="{{ old('name', $user->birth_date) }}" />

        <div class="flex items-center gap-4">
            <button type="submit" class="accentButton">
                Guardar
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Perfil guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
