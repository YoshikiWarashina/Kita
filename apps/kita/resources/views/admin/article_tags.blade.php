@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>タグ管理</h1>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-success">
                <h5 class="fw-bolder">Success!</h5>
                {{ session('message') }}
            </div>
        @endif

        {!! Form::open(['route' => 'tag.index', 'method' => 'GET']) !!}
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 bg-white">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <p class="mb-2">タグ名</p>
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 text-center">
                    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="row">
            <nav aria-label="...">
                <ul class="pagination pt-3">
                    @if ($tags->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="前">
                                Previous
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $tags->previousPageUrl() }}" aria-label="前">
                                Previous
                            </a>
                        </li>
                    @endif

                    @php
                        $startPage = max(1, $tags->currentPage() - 1);
                        $endPage = min($startPage + 2, $tags->lastPage());
                    @endphp

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        <li class="page-item{{ $tags->currentPage() == $page ? ' active' : '' }}">
                            <a class="page-link" href="{{ $tags->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    @if ($tags->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $tags->nextPageUrl() }}" aria-label="次">
                                Next
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="次">
                                Next
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded bg-white">
                    <div class="p-3">
                        <a href="{{ route('tag.create') }}" class="btn btn-primary">新規登録</a>
                    </div>
                    <div class="col-md-12 col-12 px-3">
                        <table class="table table-bordered table-hover">
                            <colgroup span="4"></colgroup>
                            <tr>
                                <th>ID</th>
                                <th>タグ名</th>
                                <th>登録日時</th>
                                <th>レコード操作</th>
                            </tr>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary">編集</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
