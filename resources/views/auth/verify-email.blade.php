<x-guest-layout>
    <div class="mt-4 flex items-center justify-between text-center">
        <x-customUserForm>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="mb-4 text-sm color-cText">
                    Gracias por registrarte! Antes de comenzar, ¿puedes verificar tu dirección de correo electrónico
                    haciendo clic en el enlace que acabamos de enviar por correo electrónico? Si no recibiste el correo
                    electrónico, nos encantaría enviarte otro.
                </div>

                @if (session('verificationStatus') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm color-cSecondary">
                        Se ha enviado un nuevo enlace de verificación al correo electrónico que proporcionaste durante
                        el registro.
                    </div>
                @endif

                <div>
                    <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                        Reenviar correo de verificación
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="underline text-sm color-cText rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Cerrar sesión
                </button>
            </form>
        </x-customUserForm>
    </div>
</x-guest-layout>
