@extends('user.header')

@section('content')
    <div class="container my-5">
        @if(session('message'))
            <div class="alert alert-success">
                <h5 class="fw-bolder">Success!</h5>
                {{ session('message') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-12 bg-white rounded">
                {!! Form::open(['route' => ['article.update', $article->id], 'method' => 'PUT']) !!}
                <div class = "container">
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タイトル</p>
                        </div>
                        {{ Form::text('title', $article->title, ['class' => 'form-control border-success', 'id' => 'title']) }}
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タグ</p>
                        </div>
                        <select class="form-select border-success" size="3" aria-label="size 3 select example">
                            <option value="1">PHP</option>
                            <option value="2">Java</option>
                            <option value="3">javascript</option>
                            <option value="4">Ruby</option>
                        </select>
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>記事内容</p>
                        </div>
                        {{ Form::textarea('contents', $article->contents, ['class' => 'form-control border-success', 'id' => 'contents']) }}
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-3 col-12">
                            <div class="py-3 px-3">
                                <div class="text-center py-2">
                                    {{ Form::submit('更新する', ['class' => 'btn btn-success rounded-pill col-12']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
