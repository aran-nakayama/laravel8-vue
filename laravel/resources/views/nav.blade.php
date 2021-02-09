<nav class="navbar navbar-expand navbar-dark green">

  <a class="navbar-brand" href="/"><i class="fab fa-pagelines"></i> くさったー</a>

    <ul class="navbar-nav ml-auto">

        @guest {{-- ログインしていない --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
        @endguest

        @auth  {{-- ログイン中 --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/articles/create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button"
                            onclick="location.href=''">
                    マイページ
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
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
