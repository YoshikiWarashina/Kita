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
            <div class = "row">
                <div class="text-center mb-3">
                    <h1><strong>Kita</strong> Administrator console</h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-12">
                    <div class="border rounded bg-white py-3 px-3">
                        <div class="col px-4 my-4">
                            <div class="row">
                                <p class="mb-2 col-auto">メールアドレス</p>
                            </div>
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                        </div>
                        <div class="col px-4 my-4">
                            <div class="row">
                                <p class="mb-2 col-auto">パスワード</p>
                            </div>
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                        </div>
                        <div class="col-md-4 col-12 px-4 my-4">
                            {{ Form::submit('ログイン', ['class' => 'btn btn-primary col-12']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
