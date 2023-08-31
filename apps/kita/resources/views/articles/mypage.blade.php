@extends('user.header')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            @if(session('message'))
                <div class="alert alert-success">
                    <h5 class="fw-bolder">Success!</h5>
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-md-8 col-12 bg-white rounded">
                <div class="container">
                    <div class="py-3 text-secondary">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" id="my-button">一括削除</button>
                        </div>
                        @foreach ($articles as $article)
                            @if ($article->member_id === auth()->id())
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="col pt-2">
                                        <p>{{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
                                        <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none">
                                            <h3 class="text-secondary">{{ $article->title }}</h3>
                                        </a>
                                        <div class="row">
                                            @foreach ($article->tags as $tag)
                                                <div class="col-auto">
                                                    <p class="text-white bg-primary px-2 rounded">{{ $tag->name }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" data-article-id="{{ $article->id }}" class="article-checkbox">
                                    </div>
                                </div>
                                <div class="w-100 border"></div>
                            @endif
                        @endforeach
                    </div>
                    {{ $articles->appends(['selected_articles' => implode(',', session('selected_articles', []))])->links('articles.common.article_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
