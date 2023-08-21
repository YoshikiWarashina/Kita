@extends('admin.admin_menu.header')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>管理者管理 - 新規登録</h1>
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </section>


        <section class="content mx-2">
            <div class="container-fluid">
                {!! Form::open(['route' => 'admin_users.store', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">姓</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">名</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">メールアドレス</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">パスワード</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">パスワード（確認)</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                {{ Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
