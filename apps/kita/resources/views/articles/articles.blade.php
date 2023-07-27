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
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8 col-12 bg-white rounded">
                <div class="container">
                    <div class = "py-3 text-secondary">
                        @foreach ($articles as $article)
                            <p>{{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
                            <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none">
                                <h3 class="text-secondary">{{ $article->title }}</h3>
                            </a>
                            <div class="row mb-2 border-bottom border-dark">
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
                        @endforeach
                    </div>
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center pt-3">
                            @if ($articles->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link text-success border-success" aria-label="前">
                                        Previous
                                    </span>
                                </li>
                            @else
                                <li class="page-item text-success border-success">
                                    <a class="page-link text-success border-success" href="{{ $articles->previousPageUrl() }}" aria-label="前">
                                        Previous
                                    </a>
                                </li>
                            @endif

                            @php
                                $startPage = max(1, $articles->currentPage() - 1);
                                $endPage = min($startPage + 2, $articles->lastPage());
                            @endphp

                            @for ($page = $startPage; $page <= $endPage; $page++)
                                <li class="page-item{{ $articles->currentPage() == $page ? ' active' : '' }}">
                                    <a class="page-link border-success text-success{{ $articles->currentPage() == $page ? ' bg-success' : '' }}" href="{{ $articles->url($page) }}">{{ $page }}</a>
                                </li>
                            @endfor

                            @if ($articles->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link text-success border-success" href="{{ $articles->nextPageUrl() }}" aria-label="次">
                                        Next
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link text-success border-success" aria-label="次">
                                        Next
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
