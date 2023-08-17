@extends('admin.admin_menu.header')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>管理者管理</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content mx-2">
            {!! Form::open(['route' => 'admin_users.index', 'method' => 'GET']) !!}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label>姓</label>
                                            {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label>名</label>
                                            {!! Form::text('first_name', null, ['class' => 'form-control', 'id' =>'first_name']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
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
                            {{ $admins->appends(request()->query())->links('admin.common.admin_pagination') }}
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
                                <a href="{{ route('admin_users.create') }}" class="btn btn-primary">新規登録</a>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>名前</th>
                                        <th>メールアドレス</th>
                                        <th>更新日時</th>
                                        <th>登録日時</th>
                                        <th>レコード操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->last_name }} {{ $admin->first_name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->updated_at }}</td>
                                            <td>{{ $admin->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin_users.edit', $admin->id) }}" class="btn btn-primary">編集</a>
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
