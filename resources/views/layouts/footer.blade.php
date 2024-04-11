<footer class="footer bg-cPrimary color-cText p-4 justify-center text-center grid grid-cols-3">
    <div>
        <a class="cSubTitle block" href="">Terminos y condiciones</a>
        <a class="cSubTitle block" href="">Política de coockies</a>
        <a class="cSubTitle block" href="">Política de privacidad</a>
    </div>
    <div class="flex justify-center items-center"> <!-- Agrega las clases "flex justify-center items-center" -->
        <a href="{{ route('index') }}">
            <x-application-logo class="block h-9 fill-current color-cPrimary" />
        </a>
    </div>
    <div>
        <p class="cSubTitle block">Contactanos:</p>
        <p class="cSubTitle block">X@correo.com</p>
        <p class="cSubTitle block">+34 000 00 00 00</p>
    </div>
</footer>
