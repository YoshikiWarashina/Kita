@extends('user.header')

@section('content')
    <div class="container">
        <div class = "row d-flex justify-content-center pt-4">
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
                            {!! Form::open(['route' => 'profile.update', 'method' => 'PUT']) !!}
                                <div class="col px-4 mb-4">
                                    <div class="row">
                                        <p class="mb-2 col-auto">{{ __('ユーザー名') }}</p>
                                    </div>
                                    {!! Form::text('name', $member->name, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

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
                                    {!! Form::email('email', $member->email, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

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
                                    {!! Form::submit(__('更新する'), ['class' => 'btn btn-success rounded-pill']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
