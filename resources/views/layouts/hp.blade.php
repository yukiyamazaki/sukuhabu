<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
    <link rel="stylesheet" href="{{ asset('assets/css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hp.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/top.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contents.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/terms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/upload.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mypage.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mypage_edit.css')}}">
 
</head>

<body>

    <div class="wrapper">

        <header>

            <nav>

                <li>
                    <a href="{{ url('/') }}">
                        <img id="logo" src="{{ asset('assets/img/logo.png') }}" alt="">
                    </a>
                </li>
                <li><a class="about_sh" href="{{url('/about')}}">「スクールハブ」とは？</a></li>

                {{-- キーワード検索 --}}
                <form method="get" action="{{url('/search')}}" class="search_container">
                {{ csrf_field() }}
                    <input type="text" size="25" name="keyword" placeholder="キーワードを入力">
                    <svg type="text" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="currentColor" /></svg>
                    <input type="submit" value="">
                </form>

            </nav>

            <nav>

                <li><a href="{{url('/upload')}}">投稿</a></li>
                <li><a href="{{url('/signup')}}">登録</a></li>
                <li><a href="#" id="icon" onclick="icon()"></a></li>

            </nav>

        </header>

        <div id="menu_bar" style="display: none;">

            <ul class="menu">
                <li class="menu_single">
                    <ul class="menu_second">
                        <li><a class="menu_time" href="{{ url('/mypage') }}">マイページへ</a></li>
                        <li><a href="{{ url('/about') }}"><span>About</span></a></li>
                        <li><a href="{{ url('/suport') }}">サポート</a></li>
                        <li><a href="{{ url('/contact') }}">問い合わせ</a></li>
                        <li><a href="{{ url('/logout') }}">ログアウト</a></li>
                    </ul>
                </li>
            </ul>

        </div>

        <main>
            @yield('content')
        </main>

        <footer>
            <small>Copyright © 2020 School Hub All Rights Reserved.</small>
        </footer>

    </div>

    <script src="{{ asset('assets/js/hp_top.js') }}"></script>
</body>
</html>
