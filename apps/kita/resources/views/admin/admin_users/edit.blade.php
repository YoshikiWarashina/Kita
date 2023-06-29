@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>管理者管理 - 編集</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <div class="col px-4 my-4">
                        <p class="mb-2">ID</p>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'disabled', 'id' => 'sirName']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">姓</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'id' => 'sirName']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">名</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'id' => 'sirName']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto ">メールアドレス</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'id' => 'sirName']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">パスワード</p>
                        <p>・・・・</p>
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">更新日時</p>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'disabled', 'id' => 'sirName']) }}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">登録日時</p>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'disabled', 'id' => 'sirName']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('更新する', ['class' => 'btn btn-primary col-12']) }}
                    </div>
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('削除する', ['class' => 'btn btn-danger col-12']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
