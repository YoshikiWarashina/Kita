@extends('user.header')

@section('content')
    <div class="container my-5 py-2">
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
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-12 bg-white rounded">
                <div class="container">
                    <div class="row justify-content-end">

                        @if($article->member_id === auth()->id())
                        <div class="col-auto mt-4 text-end">
                            {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm rounded-pill']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-auto mt-4 text-end">
                            {!! Form::open(['route' => ['article.edit', $article->id], 'method' => 'GET']) !!}
                            {!! Form::submit('更新する', ['class' => 'btn btn-success btn-sm rounded-pill']) !!}
                            {!! Form::close() !!}
                        </div>
                        @endif

                    </div>
                    <div class = "py-3 text-secondary">
                        <h3>{{ $article->title }}</h3>
                        <p>{{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
                        <div class="row pt-4">
                            <div class="col-auto">
                                <p class="text-white bg-primary px-2 rounded">javascript</p>
                            </div>
                            <div class="col-auto">
                                <p class="text-white bg-primary px-2 rounded">Vue</p>
                            </div>
                            <div class="col-auto">
                                <p class="text-white bg-primary px-2 rounded">Vite</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 text-secondary">
                        <div class="pb-2">
                            <p>{!! nl2br($article->contents) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center my-4">
            <div class="col-md-8 col-12 bg-white rounded">
                <div class=" mt-4 px-2">
                    <h4 class="text-secondary">コメント</h4>
                </div>
                <div class="border-dark border-top"></div>
                <div class="px-2">
                    @foreach ($article->comments as $comment)
                    <div class="border-bottom border-dark">
                        <p class="text-secondary mx-2 mt-3">{{ $comment->member->name }}が{{ $comment->created_at->format('Y年m月d日') }}に投稿</p>
                        <p class="text-secondary mx-2">{!! nl2br(e($comment->contents)) !!}</p>
                    </div>
                    @endforeach
                </div>

                {!! Form::open(['route' => ['comment.store', $article->id]]) !!}
                <div class="row align-items-end pb-2">
                    <div class="col-md-9 col-12">
                        <div class="py-2 mx-2">
                            {{ Form::hidden('article_id', $article->id) }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control border-success', 'id' => 'comment', 'placeholder' => 'コメントを入力']) }}
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="py-2 px-2">
                            <div class="text-center">
                                {{ Form::submit('コメント', ['class' => 'btn btn-outline-success rounded-pill col-12']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
