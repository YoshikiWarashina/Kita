@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理 - 更新</h1>
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
        {!! Form::open(['route' => ['tag.update', $tag->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="border rounded bg-white py-3">
                    <div class="col px-4 my-4">
                        <p class="mb-2">ID</p>
                        {!! Form::text('id', $tag->id, ['class' => 'form-control', 'disabled', 'id' => 'id']) !!}
                    </div>
                    <div class="col px-4 my-4">
                        <div class="row">
                            <p class="mb-2 col-auto">タグ名</p>
                            <p class="mb-2 col-auto text-center rounded bg-danger text-white">必須</p>
                        </div>
                        {!! Form::text('tag_name', $tag->name, ['class' => 'form-control', 'id' => 'tag_name']) !!}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">更新日時</p>
                        {!! Form::text('updated_at', $tag->updated_at, ['class' => 'form-control', 'disabled', 'id' => 'updated_at']) !!}
                    </div>
                    <div class="col px-4 my-4">
                        <p class="mb-2">登録日時</p>
                        {!! Form::text('created_at', $tag->created_at, ['class' => 'form-control', 'disabled', 'id' => 'created_at']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="border rounded bg-white py-3 px-3">
                    <div class="col-md-12 col-12 text-center py-2">
                        {!! Form::submit('更新する', ['class' => 'btn btn-primary w-100']) !!}
                    </div>
                    <div class="col-md-12 col-12 text-center py-2">
                        {!! Form::submit('削除する', ['class' => 'btn btn-danger w-100']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
