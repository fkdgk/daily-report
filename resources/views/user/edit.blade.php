@extends('adminlte::page')

@section('title', config('app.title_user_edit'))

@section('content_header')
    {{ Breadcrumbs::render('user.edit', $user) }}
@stop

@section('content')
    <div class="container" style="max-width:900px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'files' => true]) }}
                            
                            <div class="form-group row align-items-center">
                                <label class="col-sm-2 col-form-label" for="file">
                                    <img src="{{ asset('img') . '/' . $user -> img }}" alt="Admin" class="rounded-circle" width="100">
                                </label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        {{ Form::file('img', ['id'=>'file' ,'class' => 'custom-file-input' . ($errors->has('img') ? ' is-invalid' : null)]) }}
                                        <span class="invalid-feedback">{{ $errors->first('img') }}</span>
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">名前</label>
                                <div class="col-sm-10">
                                    {{ Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => '山田 太郎', 'autocomplete' => 'off']) }}
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    {{ Form::text('email', null, ['class' => 'form-control ' . ($errors->has('email') ? ' is-invalid' : null), 'placeholder' => 'example@email.com', 'autocomplete' => 'off']) }}
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    {{ Form::password('password',['class'=>'form-control '. ($errors->has('password') ? ' is-invalid' : null),'placeholder'=>'Password','autocomplete'=>'off']) }}
                                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">部署</label>
                                <div class="col-sm-10">
                                    {{ Form::select('division_id', $divisions,null,['class'=>'form-control '. ($errors->has('division_id') ? ' is-invalid' : null),'placeholder'=>'選択してください']) }}
                                    <span class="invalid-feedback">{{ $errors->first('division_id') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">権限</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        {{ Form::radio('role', 'user', null, ['class' => 'form-check-input', 'id' => 'user']) }}
                                        <label class="form-check-label" for="user">
                                            ユーザ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        {{ Form::radio('role', 'admin', null, ['class' => 'form-check-input', 'id' => 'admin']) }}
                                        <label class="form-check-label" for="admin">
                                            管理者
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ステータス</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        {{ Form::radio('active', 1, null, ['class' => 'form-check-input', 'id' => 'active']) }}
                                        <label class="form-check-label" for="active">
                                            有効
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        {{ Form::radio('active', 0, null, ['class' => 'form-check-input', 'id' => 'deactive']) }}
                                        <label class="form-check-label" for="deactive">
                                            無効
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg">更新</button>
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
@endsection
