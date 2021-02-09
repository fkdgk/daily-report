<div class="row">
    <div class="col-lg-3 form-group">
        <label for="work_date">出社日</label>
        {{ Form::text('work_date',(Route::is('post.create')?date('Y-m-d'):null),
            [
                'id'=>'work_date',
                'class'=> 'datepicker form-control'. ($errors->has('work_date') ? ' is-invalid' : null) ,
                'autocomplete'=>'off',
                'required' => true,
            ]
        ) }}
        <span class="invalid-feedback">{{ $errors -> first('work_date') }}</span>
    </div>
    <div class="col-lg-2 form-group">
        <label for="start_time">出勤時刻</label>
        {{ Form::text('start_time',(Route::is('post.create')) ? config('app.start_time') : null,
            [
                'id'=>'start_time',
                'class'=>'timepicker form-control' . ($errors->has('start_time') ? ' is-invalid' : null) ,
                'autocomplete'=>'off'
            ]
        ) }}
        <span class="invalid-feedback">{{ $errors -> first('start_time') }}</span>
    </div>
    <div class="col-lg-2 form-group">
        <label for="finish_time">退勤時刻</label>
        {{ Form::text('finish_time',(Route::is('post.create'))?config('app.finish_time'):null,
            [
                'id'=>'finish_time',
                'class'=>'timepicker form-control'. ($errors->has('finish_time') ? ' is-invalid' : null) ,
                'autocomplete'=>'off'
            ]
        ) }}
        <span class="invalid-feedback">{{ $errors -> first('finish_time') }}</span>
    </div>
</div>

<h6 class="text-bold mb-0 mt-3">作業内容</h6>

<div class="row align-items-center">
    <div class="col-lg-3 mt-2 text-bold small">プロジェクト名</div>
    <div class="col-lg-2 mt-2 text-bold small">作業時間</div>
    <div class="col-lg-3 mt-2 text-bold small">進捗率</div>
    <div class="col-lg-3 mt-2 text-bold small">納期</div>
    <div class="col-lg-1 mt-2 text-bold small"></div>
</div>

@foreach ($works as $work)
    @include('post.work',[
        'project_id' => $work -> project_id,
        'work_time' => $work -> work_time,
        'progress' => $work -> progress,
        'limit' => $work -> limit,
    ])
@endforeach

<div id="append-to"></div>

<div class="row">
    <div class="col-lg-12 text-center">
        <button type="button" class="mt-2 btn btn-outline-primary btn-sm small text-nowrap" id="append-btn"> <i class="fa fa-plus"></i> プロジェクト追加 </button>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 pt-2">
        <h6 class="text-bold mb-2">作業内容</h6>
        {{ Form::textarea('body',null,['class'=>'form-control form-control-sm small','rows'=>7]) }}
    </div>
</div>
{{ Form::submit($text,['class'=>'btn btn-lg btn-success mt-4 mb-2 btn-block','style'=>'max-width:300px;margin:0 auto;'])}}