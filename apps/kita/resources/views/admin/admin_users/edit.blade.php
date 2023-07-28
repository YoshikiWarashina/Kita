@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
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
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    {!! Form::open(['route' => ['admin_users.update', $admin->id],'method' => 'PUT']) !!}
                    <div class="col px-4 my-4">
                        <p class="mb-2">ID</p>
                        {{ Form::text('id', $admin->id, ['class' => 'form-control', 'disabled', 'id' => 'id']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">姓</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('last_name', $admin->last_name, ['class' => 'form-control', 'id' => 'last_name']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">名</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('first_name', $admin->first_name, ['class' => 'form-control', 'id' => 'first_name']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto ">メールアドレス</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::email('email', $admin->email, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">パスワード</p>
                        <p>・・・・</p>
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">更新日時</p>
                        {{ Form::text('updated_at', $admin->updated_at, ['class' => 'form-control', 'disabled', 'id' => 'update_at']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">登録日時</p>
                        {{ Form::text('created_at', $admin->created_at, ['class' => 'form-control', 'disabled', 'id' => 'created_at']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <div class="col-md-12 col-12 text-center py-2">
                        {!! Form::submit('更新する', ['class' => 'btn btn-primary col-12']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-12 col-12 text-center py-2">
                        {!! Form::open(['route' => ['admin_users.destroy', $admin->id],'method' => 'DELETE', 'onsubmit' => "return confirm('一度削除すると元に戻せません。よろしいですか？');"]) !!}
                        {!! Form::submit('削除する', ['class' => 'btn btn-danger col-12']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
