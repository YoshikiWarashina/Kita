@extends('user.header')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-12 bg-white rounded">
                <div class = "container">
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タイトル</p>
                        </div>
                        {{ Form::text('last_name', null, ['class' => 'form-control border-success', 'id' => 'last_name']) }}
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>タグ</p>
                        </div>
                        <select class="form-select border-success" size="3" aria-label="size 3 select example">
                            <option value="1">PHP</option>
                            <option value="2">Java</option>
                            <option value="3">javascript</option>
                            <option value="4">Ruby</option>
                        </select>
                    </div>
                    <div class="px-3 py-4">
                        <div class="pb-0">
                            <p>記事内容</p>
                        </div>
                        {{ Form::textarea('last_name', null, ['class' => 'form-control border-success', 'id' => 'last_name']) }}
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-3 col-12">
                            <div class="py-3 px-3">
                                <div class="text-center py-2">
                                    {{ Form::submit('投稿する', ['class' => 'btn btn-success rounded-pill col-12']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
