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
                
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <label for="work_date">出社日</label>
                            <input type="date" name="work_date" id="work_date" class="form-control is-invalid" placeholder="Enter text" autocomplete="off">
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="start_date">出勤時刻</label>
                            <input type="time" name="start_date" id="start_date" class="form-control is-invalid" placeholder="Enter text" autocomplete="off">
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label for="finish_date">退勤時刻</label>
                            <input type="time" name="finish_date" id="finish_date" class="form-control is-invalid" placeholder="Enter text" autocomplete="off">
                            <span class="invalid-feedback">Please enter a text address</span>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="text" class="form-control is-invalid" placeholder="Enter text" autocomplete="off">
                        <span class="invalid-feedback">Please enter a text address</span>
                    </div>

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