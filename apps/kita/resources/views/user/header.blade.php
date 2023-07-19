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
    <div class="container-fluid sticky-top border bg-white">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 my-3">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container">
                        <a class="navbar-brand text-light bg-success px-4" style="border-radius: 50%;" href="#"><h1>Kita</h1></a>
                        <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav pl-md-4 my-md-0 mt-3 mb-lg-0">
                                <div class="input-group mx-md-4 mx-2">
                                    {!! Form::open(['route' => 'article.search', 'method' => 'GET', 'class' => 'd-flex align-items-center']) !!}
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search for something']) !!}
                                    {!! Form::submit('検索', ['class' => 'btn btn-success col-auto']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </ul>
                            <div class="mx-2">
                                {!! Form::open(['route' => 'article.create', 'method' => 'GET']) !!}
                                {!! Form::submit('記事を作成する', ['class' => 'btn btn-outline-success my-md-0 my-3']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="mx-2">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle　dropdown-toggle-no-caret" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item text-primary" href="{{ route('profile.edit') }}">プロフィール編集</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-primary">ログアウト</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="main">
    @yield('content')
</div>
</body>
</html>
