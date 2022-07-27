<nav class="navbar navbar-dark navbar-custom fixed-top navbar-expand-md shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{  route('home.show')  }}">
            <img src="/storage/images/logo/headerlogo.svg">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.post.create', ['catId' => $currentCat->id ?? '0']) }}" class="button">Новий запис</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sessions.show') }}">Сеанси</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.show') }}">Новини</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.show') }}">Блоґ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('programs.show') }}">Програми</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.show') }}">Проєкти</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="ddMenuAbout" data-bs-toggle="dropdown" aria-expanded="false">
                        Про нас
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="ddMenuAbout">
                        <li><a class="dropdown-item" href="#">Контакти</a></li>
                        <li><a class="dropdown-item" href="#">Про нас</a></li>
                        <li><a class="dropdown-item" href="{{route('post.showbyslug',['postSlug'=>'hystory-ua'])}}">Історія</a></li>
                        <li><a class="dropdown-item" href="#">Публічна оферта</a></li>
                    </ul>
                </li>
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.news.show') }}">Адмінпанель</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>