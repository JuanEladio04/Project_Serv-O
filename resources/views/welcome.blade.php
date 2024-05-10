<x-app-layout>

    <section id="header" class="h-screen my-10">
        <a href="{{ route('index') }}">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-72</x-application-logo>
        </a>
    </section>

    <section id="aboutUs" class="shadow-lg py-20 my-10">
        <div class="sm:w-1/2 sm:px-32 px-10">
            <h2 class="text-3xl my-5">
                Sobre nosotros
            </h2>
            <p class="text-lg my-5">
                Bienvenido a Serv-Ω, tu fuente confiable para monitorear el estado de tus servidores y recursos de
                sistema. En Serv-Ω, nos dedicamos a proporcionarte información precisa y actualizada sobre el
                rendimiento de tus servidores y recursos, para que puedas tomar decisiones informadas y mantener tus
                sistemas en óptimas condiciones.
            </p>
        </div>
    </section>

    <section class="text-center sm:mx-32">
        <h2 class="text-7xl my-5">
            Nuestros valores
        </h2>
        <div class="grid grid-cols-3">
            <div>
                <img src="/img/index/reliability.png" alt="Imagen representativa de la fiabilidad">
                <p class="cTitle text-3xl sm:block hidden">
                    Fiabilidad
                </p>
            </div>
            <div>
                <img src="/img/index/security.png" alt="Imagen representativa de la seguridad">
                <p class="cTitle text-3xl sm:block hidden">
                    Seguridad
                </p>
            </div>
            <div>
                <img src="/img/index/compromise.png" alt="Imagen representativa del compomiso">
                <p class="cTitle text-3xl sm:block hidden">
                    Compromiso
                </p>
            </div>
        </div>
    </section>

</x-app-layout>
