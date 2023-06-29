<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div class="container">
    <div class = "row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class = "col-md-6 col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-12">
                    <div class="py-3 px-3">
                        <div class="col">
                            <div class="row">
                                <h1 class="border-bottom border-dark py-2"><strong>Kita</strong> ログイン</h1>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded bg-white pt-3 px-3">
                        <div class="col mx-4">
                            <div class="row">
                                <p class="text-end">新規会員登録は<a href="" style="text-decoration: none;">こちら</a></p>
                            </div>
                        </div>
                        <form method="POST" action="" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="col px-4 mb-4">
                                <div class="row">
                                    <p class="mb-2 col-auto">メールアドレス</p>
                                </div>
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="col px-4 my-4">
                                <div class="row">
                                    <p class="mb-2 col-auto">パスワード</p>
                                </div>
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                            <div class="col-md-4 col-12 px-4 my-4">
                                <button type="submit" class="btn btn-success col-12">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
