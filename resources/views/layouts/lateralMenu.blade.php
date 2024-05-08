    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': openMenu, 'hidden': !openMenu }" class="sm:hidden lat-menu h-full">
        <div class="bg-cPrimary w-64 pt-5 pb-5 h-full">
            <div class="mt-5 h-full" x-data="{ openWKMenu: false }">
                <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ 'Inicio' }}
                </x-responsive-nav-link>
                @auth
                    <x-responsive-nav-link :href="route('workSpace.create')" :active="request()->routeIs('workSpace.create')">
                        {{ 'Crear espacio de trabajo' }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link>
                        <button @click="openWKMenu = !openWKMenu" class="inline-flex items-center gap-2">
                            <span class="material-symbols-outlined"
                                :class="{ 'inline-block': !openWKMenu, 'hidden': openWKMenu }">
                                expand_more
                            </span>
                            <span class="material-symbols-outlined"
                                :class="{ 'inline-block': openWKMenu, 'hidden': !openWKMenu }">
                                expand_less
                            </span>
                            Mis espacios de trabajo
                        </button>
                    </x-responsive-nav-link>

                    <div :class="{ 'block': openWKMenu, 'hidden': !openWKMenu }" class="overflow-y-auto overflow-x-hidden h-auto">
                        @foreach (Auth::user()->WorkSpaces as $workSpace)
                            <x-responsive-nav-link :class="'inline-flex items-center gap-2 ml-5'" :href="route('workSpace.show', [$workSpace->id])" :active="request()->routeIs('workSpace.show', [$workSpace->id])">
                                <span class="material-symbols-outlined">
                                    radio_button_checked
                                </span>
                                {{ $workSpace->name }}
                            </x-responsive-nav-link>
                        @endforeach
                    </div>
                    <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('userGestion')">
                        {{ 'Gestión de usuarios' }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('service.index')" :active="request()->routeIs('service.index')">
                        {{ 'Gestión de servicios' }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('command.index')" :active="request()->routeIs('command.index')">
                        {{ 'Registro de comandos' }}
                    </x-responsive-nav-link>
                    <div class="h-full bg-slate-50 flex flex-col justify-end">
                        <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ Auth::user()->name }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">
                                {{ 'Cerrar Sesión' }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ 'Iniciar Sesión' }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ 'Registrarse' }}
                    </x-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
