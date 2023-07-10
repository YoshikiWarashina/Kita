@extends('user.header')

@section('content')
    <div class="container my-5 py-2">
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
                        <div class="col-auto mt-4 text-end">
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                {{ __('削除する') }}
                            </button>
                        </div>
                        <div class="col-auto mt-4 text-end">
                            <button type="submit" class="btn btn-success btn-sm rounded-pill">
                                {{ __('更新する') }}
                            </button>
                        </div>
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
                <div class="py-3 px-2">
                    <div class="border-bottom border-dark">
                        <p class="text-secondary mx-2">hogehogeが2021年5月21日に投稿</p>
                        <p class="text-secondary mx-2">コメントをここにバーーーーーーーーーー<br>
                            ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー</p>
                    </div>
                    <div class="py-3 px-2 border-bottom border-dark">
                        <p class="text-secondary mx-2">hogehogeが2021年5月21日に投稿</p>
                        <p class="text-secondary mx-2">コメントをここにバーーーーーーーーーー<br>
                            ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー</p>
                    </div>
                </div>

                <div class="row align-items-end pb-2">
                    <div class="col-md-9 col-12">
                        <div class="py-2 mx-2">
                            {{ Form::textarea('last_name', null, ['class' => 'form-control border-success', 'id' => 'last_name', 'placeholder' => 'コメントを入力']) }}
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="py-2 px-2">
                            <div class="text-center">
                                {{ Form::submit('コメント', ['class' => 'btn border-success text-success rounded-pill col-12']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
