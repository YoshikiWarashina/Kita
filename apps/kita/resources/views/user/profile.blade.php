@extends('user.header')

@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center pt-4" style="height: 100vh;">
            <div class = "col-md-8 col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="border rounded bg-white px-3">
                            <div class="py-3 px-3">
                                <div class="col">
                                    <div class="row">
                                        <h1 class="border-bottom border-dark py-2">プロフィール編集</h1>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="">
                                @csrf
                                <div class="col px-4 mb-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('ユーザー名') }}</p>
                                    </div>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col px-4 my-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('メールアドレス') }}</p>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col px-4 my-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('パスワード') }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="mb-2 col-auto">・・・・</p>
                                        <div class="mb-2 col-auto btn btn-success rounded-pill btn-sm text-white">パスワードを変更する</div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 px-4 my-4 text-end">
                                    <button type="submit" class="btn btn-success rounded-pill">
                                        {{ __('更新する') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
