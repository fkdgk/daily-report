@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('user.index') }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead>
                            <th>id</th>
                            <th>img</th>
                            <th>名前</th>
                            <th>Email</th>
                            <th>部署</th>
                            <th>権限</th>
                            <th>作成日</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user -> id }}</td>
<<<<<<< HEAD
                                    <td><img width="25" height="25" src="{{ asset('img/' . $user -> img) }}"></td>
=======
                                    <td>{{ $user -> img }}</td>
>>>>>>> main
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>{{ ($user -> division)?$user -> division->name:null }}</td>
                                    <td><span class="badge badge-{{ ($user -> role == 'admin')?'danger':'primary' }}">{{ $user -> role }}</span></td>
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