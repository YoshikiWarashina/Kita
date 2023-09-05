@extends('admin.admin_menu.header')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>タグ管理 - 新規登録</h1>
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </section>

        <section class="content mx-2">
            <div class="container-fluid">
                {{ Form::open(['route' => 'tag.store', 'method' => 'POST']) }}
                @csrf
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <p class="col-auto">タグ名</p>
                                            <p class="col-auto rounded bg-danger text-white">必須</p>
                                        </div>
                                        {{ Form::text('tag_name', null, ['class' => 'form-control', 'id' => 'tag_name']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="py-2">
                                    {{ Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
@endsection
