<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<header>
    <div class ="container-fluid bg-dark sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">Kita</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mx-4 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light mx-3" aria-current="page" href="#">管理者管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light mx-3" href="#">会員管理</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light mx-3" href="#">タグ管理</a>
                        </li>
                    </ul>
                    <li class="d-flex ml-auto mx-3">
                        <form method="POST" action="{{ route('admin/logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light px-4">ログアウト</button>
                        </form>
                    </li>
                </div>
            </div>
        </nav>
    </div>
</header>


<div class="main bg-light vh-100">
    @yield('content')
</div>
</body>
</html>
