@extends('admin.header')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col">
                <h1>会員管理</h1>
            </div>
        </div>

        {{ Form::open(['url' => 'admin/users', 'method' => 'GET']) }}
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 bg-white">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <p class="mb-2">ユーザー名</p>
                            {{ Form::text('sirName', null, ['class' => 'form-control', 'id' => 'sirName']) }}
                        </div>
                        <div class="col-md-6 col-12">
                            <p class="mb-2">メールアドレス</p>
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded p-3 text-center">
                    {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}

        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination pt-3">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 justify-content-center">
                <div class="border rounded bg-white">
                    <div class="p-3">
                        <table class="table table-bordered table-hover">
                            <colgroup span="4"></colgroup>
                            <tr>
                                <th>ID</th>
                                <th>ユーザー名</th>
                                <th>メールアドレス</th>
                                <th>登録日時</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
