<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium color-cTExt">
            {{ __('Eliminar') }}
        </h2>
    </header>

    <button type="submit" class="accentButton" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Eliminar cuenta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-medium color-cSecondary">
                ¿Estas seguro de que deseas <span class="color-cAccent">eliminar</span> tu cuenta?
            </h2>

            <p class="mt-1 text-sm color-cText">
                Una vez que elimines tu cuenta, se eliminarán permanentemente todos sus recursos y datos. Por favor,
                ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.
            </p>

            <div class="mt-6">
                <x-CustomInput label="Contraseña" name="password" type="password" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" class="secondaryButton" x-on:click="$dispatch('close')">
                    Cancelar
                </button>

                <button type="submit" class="accentButton ms-3">
                    Eliminar cuenta
                </button>
            </div>
        </form>
    </x-modal>
</section>
