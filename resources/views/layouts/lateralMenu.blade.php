    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': openMenu, 'hidden': !openMenu }" class="sm:hidden lat-menu h-screen">
        <div class="bg-cPrimary w-64 pt-5 pb-5 h-screen">
            <div class="mt-5">
                <!-- Links -->
                <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ __('index') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>