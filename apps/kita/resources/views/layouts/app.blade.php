<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    @if (!request()->is(['login', 'member_registration', 'admin/*']))
        @include('user.header')
        <!--管理者側のログイン画面以外の管理者画面では管理者用のヘッダーを読み込む-->
    @elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
        @include('admin.admin_menu.header')
    @endif

    @yield('content')
</body>
</html>
