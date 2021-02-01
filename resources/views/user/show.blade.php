@extends('adminlte::page')

@section('title', $user -> name)

@section('content_header')
    {{ Breadcrumbs::render('user.show',$user) }}
@stop

@section('content')
<div class="card container">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('img') . '/' . $user -> img }}" alt="Admin" class="rounded-circle" width="150" />
                    <div class="mt-3">
                        <h4>{{ $user -> name }}</h4>
                        <p class="text-secondary mb-1">{{ ($user -> division)? $user -> division -> name:null }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user -> email }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">権限</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user -> role }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">ステータス</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ ($user -> active)?'有効':'無効' }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">created</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user -> created_at }}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">updated</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user -> updated_at }}
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <h5>日報</h5>
                @include('post.posts')
            </div>
        </div>
    </div>
</div>

<div class="container pt-5 pb-5">
    <h5 class="text-center">その他のユーザ</h5>
    <div class="row text-center">
        @foreach ($users as $user)
        <div class="col-xl-2 mb-4">
            <a href="{{ route('user.show', $user -> id) }}" class="text-dark">
                <h5 class="my-3">{{$user -> name}}</h5>
                <img class="rounded-circle" src="{{ asset('img'). '/' . $user -> img }}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@stop


@section('css')
<style></style>
@endsection

@section('js')
<script></script>
@endsection