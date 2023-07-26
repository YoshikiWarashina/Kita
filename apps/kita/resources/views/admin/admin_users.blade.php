@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>管理者管理</h1>
            </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                <h5 class="fw-bolder">Success!</h5>
                {{ session('message') }}
            </div>
        @endif

        {!! Form::open(['route' => 'admin_users.index', 'method' => 'GET']) !!}
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 bg-white">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <p class="mb-2">姓</p>
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
                        </div>
                        <div class="col-md-4 col-12">
                            <p class="mb-2">名</p>
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'id' =>'first_name']) !!}
                        </div>
                        <div class="col-md-4 col-12">
                            <p class="mb-2">メールアドレス</p>
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 text-center">
                    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination pt-3">
                    <li class="page-item{{ $admins->currentPage() == 1 ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $admins->previousPageUrl() }}" aria-label="Previous">
                            Previous
                        </a>
                    </li>
                    @for ($i = 1; $i <= min(3, $admins->lastPage()); $i++)
                        <li class="page-item{{ $i == $admins->currentPage() ? ' active' : '' }}">
                            <a class="page-link" href="{{ $admins->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item{{ $admins->currentPage() == $admins->lastPage() ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $admins->nextPageUrl() }}" aria-label="Next">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded bg-white">
                    <div class="p-3">
                        {!! Form::open(['route' => 'admin_users.create', 'method' => 'GET']) !!}
                        {!! Form::submit('新規登録', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-12 col-12 px-3">
                        <table class="table table-bordered table-hover">
                            <colgroup span="4"></colgroup>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>更新日時</th>
                                <th>登録日時</th>
                                <th>レコード操作</th>
                            </tr>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->last_name }} {{ $admin->first_name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->updated_at }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td class="text-center">
                                        {!! Form::open(['route' => ['admin_users.edit', $admin->id],'method' => 'GET']) !!}
                                        {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
