@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>管理者管理 - 新規登録</h1>
            </div>
        </div>
        {!! Form::open(['route' => 'admin_users.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">姓</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">名</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">メールアドレス</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">パスワード</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">パスワード（確認）</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('登録する', ['class' => 'btn btn-primary col-12']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
