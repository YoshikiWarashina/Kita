@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
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
                {{ Form::open(['route' => 'article.store', 'method' => 'POST']) }}
                @csrf
                <div class = "container">
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タイトル</p>
                        </div>
                        {{ Form::text('title', null, ['class' => 'form-control border-success', 'id' => 'title']) }}
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タグ</p>
                        </div>
                        <select class="form-select border-success" size="5" aria-label="タグ選択" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>記事内容</p>
                        </div>
                        {{ Form::textarea('contents', null, ['class' => 'form-control border-success', 'id' => 'contents']) }}
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-3 col-12">
                            <div class="py-3 px-3">
                                <div class="text-center py-2">
                                    {{ Form::submit('投稿する', ['class' => 'btn btn-success rounded-pill col-12']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
