<div class="row align-items-center">
    <div class="col-lg-3 mb-2">
        {{ Form::select('project_id',$projects, $project_id, ['class'=>'form-control form-control-sm','placeholder'=>'選択してください']) }}
    </div>
    <div class="col-lg-2 mb-2">
        {{ Form::text('work_time',$work_time, ['class'=>'timepicker form-control form-control-sm','autocomplete'=>'off']) }}
    </div>
    <div class="col-lg-3 mb-2">
        {{ Form::text('progress',$progress, ['class'=>'slider form-control form-control-sm','autocomplete'=>'off']) }}
    </div>
    <div class="col-lg-3 mb-2">
        {{ Form::text('limit',$limit, ['class'=>'datepicker form-control form-control-sm','autocomplete'=>'off']) }}
    </div>
    <div class="col-lg-1 mb-2 form-group d-flex">
        <i class="fa fa-times text-danger work-delete" style="cursor: pointer;"></i>
    </div>
</div>