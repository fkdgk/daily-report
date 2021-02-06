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

                    <table class="table table-hover table-sm responsive nowrap">
                        <thead>
                            <th class="text-nowrap">id</th>
                            <th class="text-nowrap">ユーザ</th>
                            <th class="text-nowrap">部署</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">権限</th>
                            <th class="text-nowrap">ステータス</th>
                            <th class="text-nowrap">作成日</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user -> id }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('user.show', $user -> id) }}" class="text-dark">
                                            <img class="user-image" src="{{ asset('img/' . $user -> img) }}"> {{ $user -> name }}
                                        </a>
                                    </td>
                                    <td class="text-nowrap">{{ ($user -> division)?$user -> division->name:null }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td><span class="badge badge-{{ ($user -> role == 'admin')?'danger':'info' }}">{{ $user -> role }}</span></td>
                                    <td><span class="badge badge-{{ ($user -> active)?'primary':'warning' }}">{{ ($user -> active)?'有効':'無効' }}</span></td>
                                    <td>{{ $user -> created_at }}</td>
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