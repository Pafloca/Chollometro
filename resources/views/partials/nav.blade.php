<nav class="navbar navbar-expand-lg" style="background-color: orange">
    <a class="navbar-brand" href="/ganga"><img src="https://www.chollometro.com/assets/images/schema.org/organisation/chollometro.png" whith="50" height="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/ganga">Inici</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ganga">Nous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ganga">Destacats</a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/ganga/create">Crear Chollo</a>
                </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $user->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/perfil">Perfil</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
