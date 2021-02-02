@extends('adminlte::page')

@section('title', $post -> user -> name . 'の日報')

@section('content_header')
    {{ Breadcrumbs::render('post.edit', $post) }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                
                    {{ Form::model($post) }}
                    <div class="row">
                        <div class="col-lg-3 form-group">
                            <label for="work_date">出社日</label>
                            {{ Form::text('work_date',null,['id'=>'work_date','class'=>'datepicker form-control','autocomplete'=>'off']) }}
                            {{-- <input type="date" name="work_date" id="work_date" class="datepicker form-control is-invalid" placeholder="Enter text" autocomplete="off"> --}}
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="start_time">出勤時刻</label>
                            {{ Form::text('start_time',null,['id'=>'start_time','class'=>'timepicker form-control','autocomplete'=>'off']) }}
                            {{-- <input type="time" name="start_date" id="start_date" class="timepicker form-control is-invalid" placeholder="Enter text" autocomplete="off"> --}}
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                        <div class="col-lg-2 form-group">
                            <label for="finish_time">退勤時刻</label>
                            {{ Form::text('finish_time',null,['id'=>'finish_time','class'=>'timepicker form-control','autocomplete'=>'off']) }}
                            {{-- <input type="text" name="finish_date" id="finish_date" class="timepicker form-control is-invalid" placeholder="Enter text" autocomplete="off"> --}}
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                        <div class="col-lg-2 form-group ml-auto mt-3">
                            <button type="button" class="btn btn-outline-success float-right btn-block">更新</button>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($works as $work)
                        <div class="col-lg-3 mb-2">
                            {{ Form::select('project_id',$projects, $work -> project_id, ['class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-lg-2 mb-2">
                            {{ Form::text('work_time',$work -> work_time,['class'=>'timepicker form-control form-control-sm','autocomplete'=>'off']) }}
                        </div>
                        <div class="col-lg-2 mb-2">
                            {{ Form::text('progress',$work -> progress,['class'=>'form-control form-control-sm','autocomplete'=>'off']) }}
                        </div>
                        <div class="col-lg-3 mb-2">
                            {{ Form::text('limit',$work -> limit,['class'=>'datepicker form-control form-control-sm','autocomplete'=>'off']) }}
                        </div>
                        <div class="col-lg-2 mb-2 form-group d-flex align-items-center">
                            <i class="fa fa-times text-danger"></i>
                            {{-- <button class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i></button> --}}
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 pt-2">
                            {{ Form::textarea('body',null,['class'=>'form-control form-control-sm small','rows'=>7]) }}
                        </div>
                    </div>
                    {{ Form::close() }}
            
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="text" class="form-control is-invalid" placeholder="Enter text" autocomplete="off">
                        <span class="invalid-feedback">Please enter a text address</span>
                    </div> --}}

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