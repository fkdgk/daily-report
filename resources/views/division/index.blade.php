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
                {{ Form::open(['route'=>['division.update'],'method'=>'put']) }}
                    <table class="table table-sm responsive nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>部署名</th>
                                <th>作成日時</th>
                                <th>更新日時</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($divisions as $division)
                            <tr>
                                <td>{{ $division -> id }}</td>
                                <td>
                                    {{ Form::text('name['.$division -> id.']', $division -> name, ['class'=>'form-control form-control-sm'. ($errors -> get('name.'.$division -> id) ? ' is-invalid' : null)]) }}
                                    <span class="invalid-feedback">{{ $errors -> first('name.'.$division -> id) }}</span>
                                </td>
                                <td>{{ $division -> created_at }}</td>
                                <td>{{ $division -> updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="">
                        {{ Form::submit('更新',['class'=>'btn btn-success mt-2','style'=>'min-width:200px;']) }}
                    </div>

                {{ Form::close() }}
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