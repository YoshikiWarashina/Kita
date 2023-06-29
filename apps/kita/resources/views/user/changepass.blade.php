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
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-12">
                    <div class="border rounded bg-white">
                        <div class = "border rounded bg-light pt-2 mb-2">
                            <p class="text-start px-4 mb-2">パスワード変更</p>
                        </div>
                        <form method="POST" action="" aria-label="">
                            @csrf
                            <div class="col px-4 mb-4">
                                <div class="row">
                                    <p class="mb-2 col-auto">新しいパスワード</p>
                                </div>
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                            </div>
                            <div class="col px-4 my-4">
                                <div class="row">
                                    <p class="mb-2 col-auto">新しいパスワード（確認）</p>
                                </div>
                                <input id="password2" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                            <div class="col-md-4 col-12 px-4 my-4">
                                <button type="submit" class="btn btn-success col-12">
                                    {{ __('更新する') }}
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
