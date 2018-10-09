<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="q-wrapper">
            
        <!-- content-wrapper -->
        <div class="q-content-wrapper">
            
             <!-- header -->
            <header class="q-header">
                <div class="q-inner">
                    <a href="/" class="q-logo">
                        <img src="/storage/logo.svg" alt="" class="q-logo__img">
                    </a>
                    <div class="q-mobile-burger js-toggle-mobile-menu">
                        <span></span>
                    </div>
                    <ul class="q-main-menu">
                        @guest
                        <li class="q-main-menu__item _dropdown">
                            <a href="#" class="q-main-menu__link">Вход/регистрация</a>
                            <ul class="q-main-submenu submenu-new-projekt">
                                <li class="q-main-submenu__item">
                                    <a href="{{ route('login') }}" class="q-main-submenu__link">{{ __('Войти') }}</a>
                                </li>
                                <li class="q-main-submenu__item">
                                    <a href="{{ route('register') }}" class="q-main-submenu__link">{{ __('Регистрация') }}</a>
                                </li>
                            
                            </ul>
                        </li>
                        @else
                        <div class="q-user">
                            <div class="q-user__avatar">
                                <img src="/storage/{{ Auth::user()->image }}" alt="" class="q-user__avatar-img">
                                
                            </div>
                            <div class="q-user__info">
                                <div class="q-user__name _cursor">
                                    <span class="q-user__name--text"> {{ Auth::user()->name }}</span>
                                    <ul class="q-main-submenu">
                                        <li class="q-main-submenu__item">
                                            <a href="{{ URL::to('profile/' . Auth::user()->id) }}" class="q-main-submenu__link">Профиль</a>
                                        </li>
                                        <li class="q-main-submenu__item">
                                            <a href="projects/" class="q-main-submenu__link">Мои проекты</a>
                                        </li>
                                        <li class="q-main-submenu__item">
                                            <a href="{{ URL::to('profile/' . Auth::user()->id . '/payment') }}" class="q-main-submenu__link">Пополнить баланс</a>
                                        </li>
                                        <li class="q-main-submenu__item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" 
                                                     class="q-main-submenu__link">
                                            {{ __('Выход') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li> 
                                    </ul>
                                </div>
                          
                            </div>
                        </div>
                        <ul class="q-main-menu">
                            <li class="q-main-menu__item _dropdown _show-992">
                                <a href="#" class="q-main-menu__link">Мой профиль</a>
                                <ul class="q-main-submenu">
                                    <li class="q-main-submenu__item">
                                        <a href="{{ URL::to('profile/' . Auth::user()->id) }}" class="q-main-submenu__link">Профиль</a>
                                    </li>
                                    <li class="q-main-submenu__item">
                                        <a href="projects/" class="q-main-submenu__link">Мои проекты</a>
                                    </li>
                                    <li class="q-main-submenu__item">
                                        <a href="{{ URL::to('profile/' . Auth::user()->id . '/payment') }}" class="q-main-submenu__link">Пополнить баланс</a>
                                    </li>
                                    <li class="q-main-submenu__item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" 
                                                     class="q-main-submenu__link">
                                            {{ __('Выход') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="q-main-menu__item _dropdown">
                                <a href="#" class="q-main-menu__link">Проекты</a>
                                <ul class="q-main-submenu submenu-new-projekt">
                                    <li class="q-main-submenu__item">
                                        <a href="#" class="q-main-submenu__link">Проект 1</a>
                                    </li>
                                    <li class="q-main-submenu__item">
                                        <a href="#" class="q-main-submenu__link">Проект 2</a>
                                    </li>
                                    <li class="q-main-submenu__item">
                                        <a href="#" class="q-main-submenu__link">Проект 3</a>
                                    </li>
                                    <li class="q-main-submenu__item q-main-submenu__item-new-projekt">
                                        <a href="projects/create" class="q-main-submenu__link link-new-projekt js-show-q-create-project-popup">Создать новый проект</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="q-main-menu__item _dropdown">
                                <a href="#" class="q-main-menu__link">Баланс: {{ Auth::user()->balance }}</a>
                            </li>
                        </ul> 
                        @endguest
                    </ul>   
                </div>
            </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- footer -->
<footer class="q-footer">
    <div class="q-inner">
        <div class="q-footer__logo"><img src="/storage/uploads/logo_footer.png" alt="" class="q-logo__img"></div>
        <div class="q-footer__left-info">
            <p class="q-footer__copyright">&copy; 2018. Молодёжка Project</p>
            <ul class="q-footer__menu">
                
                <li class="q-footer__menu--item">
                    <a href="#" class="q-footer__menu--link">Контакты</a>
                </li>
                <li class="q-footer__menu--item">
                    <a href="#" class="q-footer__menu--link">Документы</a>
                </li>    
                 <li class="q-footer__menu--item">
                    <a href="#" class="q-footer__menu--link">Частые вопросы</a>
                </li>                          
            </ul>
        </div>
       
    </div>
</footer>
</body>
</html>
