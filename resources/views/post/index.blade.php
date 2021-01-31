@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('post.index') }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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