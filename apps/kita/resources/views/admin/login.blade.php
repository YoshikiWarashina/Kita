@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class = "col-md-6 col-12">
                <div class = "row">
                    <div class="text-center mb-3">
                        <h1><strong>Kita</strong> Administrator console</h1>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin.login', 'method' => 'POST']) }}
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-12">
                            <div class="border rounded bg-white py-3 px-3">
                                <div class="col px-4 my-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('メールアドレス') }}</p>
                                    </div>
                                    {{ Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required' => 'required', 'autocomplete' => 'email', 'autofocus' => 'autofocus']) }}
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
                                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required' => 'required', 'autocomplete' => 'current-password']) }}
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 px-4 my-4">
                                    {{ Form::button(__('ログイン'), ['type' => 'submit', 'class' => 'btn btn-primary col-12']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
