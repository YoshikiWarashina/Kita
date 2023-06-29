@extends('layouts.app')
@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class = "col-md-6 col-12">
                <div class = "row">
                    <div class="text-center mb-3">
                        <h1><strong>Kita</strong> Administrator console</h1>
                    </div>
                </div>
                <form method="POST" action="{{ url('admin/login') }}">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-12">
                            <div class="border rounded bg-white py-3 px-3">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 px-4 my-4">
                                    <button type="submit" class="btn btn-primary col-12">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ url('admin/password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
