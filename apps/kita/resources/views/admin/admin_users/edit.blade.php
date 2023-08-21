@extends('admin.admin_menu.header')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>管理者管理 - 編集</h1>
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
                @if(session('message'))
                    <div class="alert alert-success">
                        <h5 class="fw-bolder">Success!</h5>
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </section>

        <section class="content mx-2">
            <div class="container-fluid">
                {{ Form::open(['route' => ['admin_users.update', $admin->id],'method' => 'PUT']) }}
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <p>ID</p>
                                        {{ Form::text('id', $admin->id, ['class' => 'form-control', 'disabled', 'id' => 'id']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">姓</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('last_name', $admin->last_name, ['class' => 'form-control', 'id' => 'last_name']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">名</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('first_name', $admin->first_name, ['class' => 'form-control', 'id' => 'first_name']) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">メールアドレス</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('email', $admin->email, ['class' => 'form-control', 'id' => 'email']) }}
                                    </div>
                                    <div class="form-group">
                                        <p>パスワード</p>
                                        <p>・・・・</p>
                                    </div>
                                    <div class="form-group">
                                        <p>更新日時</p>
                                        {{ Form::text('updated_at', $admin->updated_at, ['class' => 'form-control', 'disabled', 'id' => 'updated_at']) }}
                                    </div>
                                    <div class="form-group">
                                        <p>登録日時</p>
                                        {{ Form::text('created_at', $admin->created_at, ['class' => 'form-control', 'disabled', 'id' => 'created_at']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="py-2">
                                    {{ Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) }}
                                    {{ Form::close() }}
                                </div>
                                <div class="py-2">
                                    {{ Form::open(['route' => ['admin_users.destroy', $admin->id],'method' => 'DELETE', 'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) }}
                                    {{ Form::submit('削除する', ['class' => 'btn btn-danger btn-block']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
