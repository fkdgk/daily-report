@extends('adminlte::page')

@section('title', config('app.title_project_index'))

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <th class="text-nowrap">id</th>
                                <th class="text-nowrap">name</th>
                                <th class="text-nowrap">created_at</th>
                                <th class="text-nowrap">updated_at</th>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project -> id }}</td>
                                        <td class="text-nowrap">{{ $project -> name }}</td>
                                        <td>{{ $project -> created_at }}</td>
                                        <td>{{ $project -> updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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