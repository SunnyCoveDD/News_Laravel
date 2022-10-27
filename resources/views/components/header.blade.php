<header>
    <div class="bg-light">
        <nav class="container navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('/')}}"><img width="80px" src="resources/img/Logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex me-auto mb-2 mb-lg-0">
                        @auth()
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add')}}">Добавить пост</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('acc')}}">Аккаунт</a>
                            </li>
                            @if(Auth::user()->isAdmin)
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{route('admin')}}">Панель администратора</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    @auth()
                    <div class="nav-item text-end">
                        <a type="button" class="btn btn-danger" href="{{route('logout')}}">Выйти</a>
                    </div>
                    @endauth
                    @guest()
                        <div class="text-end nav-item">
                            <a type="button" class="btn btn-outline-primary me-2" href="{{route('auth')}}">Авторизация</a>
                        </div>
                        <div class="nav-item">
                            <a type="button" class="btn btn-primary" href="{{route('reg')}}">Регистрация</a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</header>
