@extends('adminlte::page')

@section('title', config('app.title_division_index'))

@section('content_header')
    {{ Breadcrumbs::render('division.index') }}
@stop

@section('content')
{{-- {{ var_dump($errors -> all()) }} --}}
{{ var_dump($errors -> get('name.1')) }}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route'=>['division.update'],'method'=>'put']) }}
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
                                    {{ Form::text('name['.$division -> id.']', $division -> name, ['class'=>'form-control'. ($errors -> get('name.'.$division -> id) ? ' is-invalid' : null)]) }}
                                    <span class="invalid-feedback">{{ $errors -> first('name.'.$division -> id) }}</span>
                                </td>
                                <td>{{ $division -> created_at }}</td>
                                <td>{{ $division -> updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ Form::submit('send') }}
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