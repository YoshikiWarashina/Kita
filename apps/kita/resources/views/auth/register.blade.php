@extends('layouts.app')

@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class = "col-md-6 col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="py-3 px-3">
                            <div class="col">
                                <div class="row">
                                    <h1 class="border-bottom border-dark py-2"><strong>Kita</strong>会員登録</h1>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded bg-white pt-3 px-3">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col px-4 mb-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('ユーザー名') }}</p>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col px-4 my-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('メールアドレス') }}</p>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col px-4 my-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('パスワード（確認用）') }}</p>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-md-4 col-12 px-4 my-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('登録する') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
