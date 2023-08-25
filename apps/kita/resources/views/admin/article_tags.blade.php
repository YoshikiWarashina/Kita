@extends('admin.admin_menu.header')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>タグ管理</h1>
                    </div>
                </div>
                @if(session('message'))
                    <div class="alert alert-success">
                        <h5 class="fw-bolder">Success!</h5>
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </section>

        <section class="content mx-2">
            {!! Form::open(['route' => 'tag.index', 'method' => 'GET']) !!}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>タグ名</label>
                                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </section>

        <section class="content mx-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers">
                            {{ $tags->appends(request()->query())->links('admin.common.admin_pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content mx-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('tag.create') }}" class="btn btn-primary">新規登録</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>タグ名</th>
                                        <th>登録日時</th>
                                        <th>レコード操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
