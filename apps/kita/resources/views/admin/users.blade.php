@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: auto;">
        <section class="content-header mx-2 mt-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>会員管理</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content mx-2">
            {{ Form::open(['route' => 'member.index', 'method' => 'GET']) }}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>ユーザー名</label>
                                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>メールアドレス</label>
                                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </section>

        <section class="content mx-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                {{ $members->appends(request()->query())->links('admin.common.admin_pagination') }}
                            </ul>
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
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ユーザー名</th>
                                        <th>メールアドレス</th>
                                        <th>登録日時</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->id }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->created_at }}</td>
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
