<div x-data="{ openMenu: false }">
    <nav class="navbar">
        <!-- Primary Navigation Menu -->
        <div class="px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index')" :active="request()->routeIs('workSpace')">
                            {{ __('Crear espacio de trabajo') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index')" :active="request()->routeIs('userGestion')">
                            {{ __('Gestión de usuarios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index')" :active="request()->routeIs('serviceGestion')">
                            {{ __('Gestión de servicios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index')" :active="request()->routeIs('comandLog')">
                            {{ __('Registro de comandos') }}
                        </x-nav-link>
                    </div>
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden ml-auto sm:flex sm:items-center sm:ms-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md color-cSecondary bg-cBackground hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <div class="gap-4">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Iniciar sesión') }}
                            </x-nav-link>
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Registrarse') }}
                            </x-nav-link>
                        </div>
                    @endauth
                </div>

                <!-- Hamburger -->
                <div class="me-2 flex items-center sm:hidden">
                    <button @click="openMenu = !openMenu"
                        class="inline-flex items-center justify-center p-2 rounded-md color-cSecondary bg-cBackgrund transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': openMenu, 'inline-flex': !openMenu }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !openMenu, 'inline-flex': openMenu }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @include('layouts.lateralMenu', ['openMenu' => 'openMenu'])
</div>
