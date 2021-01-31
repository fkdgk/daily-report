@extends('adminlte::page')

@section('title', $user -> name)

@section('content_header')
    {{ Breadcrumbs::render('user.show',$user) }}
@stop

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
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