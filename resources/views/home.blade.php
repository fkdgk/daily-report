@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><img width="20" height="20" src="{{ asset('img') . '/' . $post -> user -> img }}"></td>
                                    <td>{{ $post -> user -> name }}</td>
                                    <td>{{ $post -> work_date }}</td>
                                    <td>{{ $post -> start_time }}</td>
                                    <td>{{ $post -> finish_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-4">
                    {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user -> name }}
                                    </td>
                                    <td>
                                        {{ ($user -> division) ? $user -> division -> name : null }}
                                    </td>
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