<nav class="navbar navbar-expand navbar-dark green">

  <a class="navbar-brand" href="/"><i class="fab fa-pagelines"></i>{{ config('app.name','Laravel') }}</a>

    <ul class="navbar-nav ml-auto">

        @guest {{-- ログインしていない --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
            </li>
        @endguest

        @auth  {{-- ログイン中 --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/articles/create') }}"><i class="fas fa-pen mr-1"></i>{{ __('messages.post') }}</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button"
                        onclick="location.href='{{ route('users.show',['name' => Auth::user()->name]) }}'">
                    {{ __('messages.mypage') }}
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                    {{ __('messages.logout') }}
                    </button>
                </div>
            </li>

            <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
            </form>
            <!-- Dropdown -->
        @endauth

    </ul>

</nav>
