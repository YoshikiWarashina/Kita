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
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand text-light bg-success px-4" style="border-radius: 50%;" href="{{ route('article.index') }}"><h1>Kita</h1></a>
                        <button class="navbar-toggler my-2 bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav pl-md-4 my-md-0 mt-3 mb-lg-0">
                                <div class="input-group mx-md-4 mx-2">
                                    {{ Form::open(['route' => 'article.index', 'method' => 'GET', 'class' => 'd-flex']) }}
                                    {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search for something']) }}
                                    {{ Form::submit('検索', ['class' => 'btn btn-success col-auto']) }}
                                    {{ Form::close() }}
                                </div>
                            </ul>
                            @if(auth()->guard('members')->check())
                            <div class="mx-2">
                                <a href="{{ route('article.create') }}" class="btn btn-outline-success my-md-0 my-3">記事を作成する</a>
                            </div>
                            @endif
                            <div class="mx-2">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle　dropdown-toggle-no-caret" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user-circle"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @if(auth()->guard('members')->check())
                                        <li>
                                            <a class="dropdown-item text-primary" href="{{ route('profile.edit') }}">プロフィール編集</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-primary" href="{{ route('my.article') }}">マイページ</a>
                                        </li>
                                        <li>
                                            {{ Form::open(['method' => 'POST', 'route' => 'logout']) }}
                                            @csrf
                                            {{ Form::button('ログアウト', ['type' => 'submit', 'class' => 'dropdown-item text-primary']) }}
                                            {{ Form::close() }}
                                        </li>
                                        @else
                                        <li>
                                            <a class="dropdown-item text-primary" href="{{ route('login.form') }}">ログイン</a>
                                        </li>
                                        @endif
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
