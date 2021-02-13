@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('user.index') }}
@stop

@section('content')
<!--
    フリーモデル画像
    https://www.pakutaso.com/model.html    
-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="mb-2 btn btn-outline-success btn-sm float-right" href="{{ route('user.create') }}"><i class="fas fa-user-plus"></i> {{ config('app.title_user_create') }}</a>
                    <div class="clearfix"></div>
                    <table class="table table-hover table-sm responsive nowrap">
                        <thead>
                            <th>id</th>
                            <th>ユーザ</th>
                            <th>部署</th>
                            <th>Email</th>
                            <th>権限</th>
                            <th>ステータス</th>
                            <th>作成日</th>
                            <th>編集</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user -> id }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user -> id) }}" class="text-dark">
                                            <img class="user-image" src="{{ $user -> getImage() }}"> {{ $user -> name }}
                                        </a>
                                    </td>
                                    <td>{{ @$user -> division -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td><span class="badge badge-{{ ($user -> role == 'admin')?'danger':'info' }}">{{ $user -> role }}</span></td>
                                    <td><span class="badge badge-{{ ($user -> active)?'primary':'warning' }}">{{ ($user -> active)?'有効':'無効' }}</span></td>
                                    <td>{{ $user -> created_at }}</td>
                                    <td><a href="{{ route('user.edit', $user -> id) }}"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
<style></style>
@endsection

@section('js')
<script></script>
@endsection