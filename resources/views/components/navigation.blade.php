<nav class="navbar navbar-expand-md navbar-light mb-5">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <x-application-logo/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <x-nav-link href="{{ route('items.index') }}" :active="request()->routeIs('items.index')">
                    Главная
                </x-nav-link>
            </ul>
            
            <ul class="navbar-nav">
                <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    Пользователи
                </x-nav-link>
            </ul>
            
            @can('create', App\Models\Item::class)
                <ul class="navbar-nav">
                    <x-nav-link href="{{ route('items.create') }}" :active="request()->routeIs('items.create')">
                        Загрузить
                    </x-nav-link>
                </ul>
            @endcan
            
            @can('view-trashed')
                <ul class="navbar-nav">
                    <x-nav-link href="{{ route('items.trashed') }}" :active="request()->routeIs('items.trashed')">
                        Корзина
                    </x-nav-link>
                </ul>
            @endcan

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                <!-- Settings Dropdown -->
                @auth
                    <x-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('users.show', [Auth::user()->name])">
                                Мои предметы
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf


                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Выйти
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-muted">Войти</a>
                @endauth
            </ul>
        </div>
    </div>
</nav>
