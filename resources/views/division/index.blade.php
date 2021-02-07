@extends('adminlte::page')

@section('title', config('app.title_division_index'))

@section('content_header')
    {{ Breadcrumbs::render('division.index') }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm responsive nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($divisions as $division)
                            <tr>
                                <td>{{ $division -> id }}</td>
                                <td>
                                    {{ Form::open(['route'=>['division.update',$division -> id]]) }}
                                        {{ Form::text('name',$division -> name,['class'=>'form-control']) }}
                                    {{ Form::close() }}
                                </td>
                                <td>{{ $division -> created_at }}</td>
                                <td>{{ $division -> updated_at }}</td>
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