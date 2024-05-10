<section>
    <header>
        <h2 class="text-lg font-medium color-cText">
            {{ __('Actualizar contraseña') }}
        </h2>

    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <x-CustomInput label="Contraseña actual" id="update_password_current_password" name="current_password"
            type="password" value="" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

        <x-CustomInput label="Nueva contraseña" id="update_password_password" name="password" type="password"
            value="" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

        <x-CustomInput label="Confirmar contrseña" id="update_password_password_confirmation"
            name="password_confirmation" type="password" value="" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        <div class="flex items-center gap-4">
            <button type="submit" class="accentButton">
                Cambiar contraseña
            </button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-cBackground">{{ __('Contraseña actualizada.') }}</p>
            @endif
        </div>
    </form>
</section>
