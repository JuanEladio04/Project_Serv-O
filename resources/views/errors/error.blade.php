<x-app-layout>

    <div class="flex flex-col justify-center items-center h-screen">
        <a href="/" class="block">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-48</x-application-logo>
        </a>
        <h1 class="text-7xl cTitle my-10">Error <span class="color-cAccent">{{ $statusCode }}</span></h1>
        <p class="text-5xl">{{ $errorMessage }}</p>
    </div>

</x-app-layout>
