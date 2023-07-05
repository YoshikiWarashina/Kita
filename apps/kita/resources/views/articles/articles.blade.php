@extends('user.header')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-12 bg-white rounded">
                <div class="container">
                    <div class = "py-3 text-secondary">
                        @foreach ($articles as $article)
                            <p>{{ $article->member->name }}が{{ $article->created_at->format('Y年m月d日') }}に投稿</p>
                            <h3>{{ $article->title }}</h3>
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
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pt-3">
                            <li class="page-item{{ $articles->currentPage() == 1 ? ' disabled' : '' }}">
                                <a class="page-link text-success border-success" href="{{ $articles->previousPageUrl() }}" aria-label="Previous">
                                    Previous
                                </a>
                            </li>
                            @for ($i = 1; $i <= min(3, $articles->lastPage()); $i++)
                                <li class="page-item{{ $i == $articles->currentPage() ? ' active' : '' }}">
                                    <a class="page-link text-success border-success{{ $i == $articles->currentPage() ? ' bg-success' : '' }}" href="{{ $articles->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item{{ $articles->currentPage() == $articles->lastPage() ? ' disabled' : '' }}">
                                <a class="page-link text-success border-success" href="{{ $articles->nextPageUrl() }}" aria-label="Next">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
