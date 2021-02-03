<<<<<<< HEAD
<div class="row">
    <div class="col-lg-3 mb-2">
        {{ Form::select('project_id',$projects, $project_id, ['class'=>'form-control form-control-sm']) }}
=======
<div class="row align-items-center">
    <div class="col-lg-3 mb-2">
        {{ Form::select('project_id',$projects, $project_id, ['class'=>'form-control form-control-sm','placeholder'=>'選択してください']) }}
>>>>>>> 1.5.1
    </div>
    <div class="col-lg-2 mb-2">
        {{ Form::text('work_time',$work_time, ['class'=>'timepicker form-control form-control-sm','autocomplete'=>'off']) }}
    </div>
<<<<<<< HEAD
    <div class="col-lg-2 mb-2">
        {{ Form::text('progress',$progress, ['class'=>'form-control form-control-sm','autocomplete'=>'off']) }}
=======
    <div class="col-lg-3 mb-2">
        {{ Form::text('progress',$progress, ['class'=>'slider form-control form-control-sm','autocomplete'=>'off']) }}
>>>>>>> 1.5.1
    </div>
    <div class="col-lg-3 mb-2">
        {{ Form::text('limit',$limit, ['class'=>'datepicker form-control form-control-sm','autocomplete'=>'off']) }}
    </div>
<<<<<<< HEAD
    <div class="col-lg-2 mb-2 form-group d-flex align-items-center">
=======
    <div class="col-lg-1 mb-2 form-group d-flex">
>>>>>>> 1.5.1
        <i class="fa fa-times text-danger work-delete" style="cursor: pointer;"></i>
    </div>
</div>