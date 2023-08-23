<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="sidebar-mini layout-fixed">
<header>
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
</header>

@include('admin.admin_menu.sidebar')


<div class="main bg-light vh-100">
    @yield('content')
</div>
</body>
</html>
