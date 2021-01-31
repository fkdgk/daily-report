@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
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
                                    <td>{{ $post -> user -> name }}</td>
                                    <td>{{ $post -> work_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->appends(request()->input())->links('pagination::bootstrap-4') }}
                    {{ $posts->links('pagination::bootstrap-4') }}
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