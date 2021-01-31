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
                        <table class="table table-sm">
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post -> id }}</td>
                                    <td> <img width="20" height="20" src="{{ asset('img') . '/' . $post -> user -> img }}"> {{ $post -> user -> name}}</td>
                                    <td>{{ $post -> work_date}}</td>
                                    <td>{{ $post -> start_time}}</td>
                                    <td>{{ $post -> finish_time}}</td>
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