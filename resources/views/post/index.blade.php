@extends('adminlte::page')

@section('title', $user -> name . 'の日報 一覧')

@section('content_header')
    {{ Breadcrumbs::render('post.index', $user) }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="float-left">{{ $user -> name }}の日報一覧</h5>
                    {{-- <h5 class="float-left">{{ App\Models\User::find($id) -> name }}の日報一覧</h5> --}}
                    @include('post.posts')
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