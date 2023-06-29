@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 新規登録</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">タグ名</p>
                            <p class="mb-2 col-auto rounded bg-danger text-white">必須</p>
                        </div>
                        {{ Form::text('sirName', null, ['class' => 'form-control', 'id' => 'sirName']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <div class="col-md-12 col-12 text-center py-2">
                        {{ Form::submit('登録する', ['class' => 'btn btn-primary w-100']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
