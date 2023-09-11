<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

@if (!request()->is(['login', 'member_registration', 'admin/*']))
    <body>
    @include('articles.common.header')
    </body>
    <!--管理者側のログイン画面以外の管理者画面では管理者用のヘッダーを読み込む-->
@elseif (!request()->is(['admin/login']) && request()->is(['admin/*']))
    <body class="sidebar-mini layout-fixed">
    @include('admin.common.header')
    </body>
@endif

<body>
@yield('content')
</body>
</html>
