@extends('layouts.app')

@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class = "col-md-6 col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="py-3 px-2">
                            <div class="col">
                                <div class="row">
                                    <h1 class="border-bottom border-dark py-2"><strong>Kita</strong>会員登録</h1>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded bg-white pt-3 px-3">
                            {{ Form::open(['route' => 'register', 'method' => 'POST']) }}
                                @csrf
                                <div class="col px-4 mb-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('ユーザー名') }}</p>
                                    </div>
                                    {{ Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'required' => 'required', 'autocomplete' => 'name', 'autofocus' => 'autofocus']) }}

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
                                    {{ Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''), 'required' => 'required', 'autocomplete' => 'email']) }}

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
                                    {{ Form::password('password', ['id' => 'password', 'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''), 'required' => 'required', 'autocomplete' => 'new-password']) }}

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
                                    {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'new-password']) }}
                                </div>
                                <div class="col-md-4 col-12 px-4 my-4">
                                    {{ Form::button(__('登録する'), ['type' => 'submit', 'class' => 'btn btn-success']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
