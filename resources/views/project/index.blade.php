@extends('adminlte::page')

@section('title', config('app.title_project_index'))

@section('content_header')
    {{ Breadcrumbs::render('project.index') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    {{ Form::open(['route'=>'project.store','class'=>'form-inline mb-2']) }}
                        {{ Form::text('name',null,[
                                'placeholder'=>'部署名',
                                'autocomplete' => 'off',
                                'class'=>'form-control mr-2'. ($errors->has('name') ? ' is-invalid' : null),
                                'required'=>true,
                            ]) }}
                        {{ Form::button('<i class="fa fa-plus"></i> 新規作成',['class'=>'btn btn-success','type'=>'submit']) }}
                        <span class="invalid-feedback">{{ $errors -> first('name') }}</span>
                    {{ Form::close() }}

                    {{ Form::open(['route'=>['project.update'],'method'=>'put']) }}
                        <table class="table table-sm responsive nowrap table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>部署名</th>
                                    <th>作成日時</th>
                                    <th>更新日時</th>
                                    <th class="text-right">削除</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="handle"><i class="fa fa-bars"></i></td>
                                    <td>
                                        {{ Form::text('name['.$project -> id.']', $project -> name, ['class'=>'form-control form-control-sm'. ($errors -> get('name.'.$project -> id) ? ' is-invalid' : null)]) }}
                                        <span class="invalid-feedback">{{ $errors -> first('name.'.$project -> id) }}</span>
                                    </td>
                                    <td>{{ $project -> created_at }}</td>
                                    <td>{{ $project -> updated_at }}</td>
                                    <td class="text-right pr-3">
                                        <button type="button" class="btn btn-xs btn-outline-danger" onclick="deleteProject({{$project->id}})">削除</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @if(!$projects -> isEmpty())
                            {{ Form::submit('更新',['class'=>'btn btn-success mt-2','style'=>'min-width:200px;']) }}
                        @endif

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
    
    {{ Form::open(['route'=>'project.destroy','class'=>'delete','method'=>'delete']) }}
        {{ Form::hidden('project_id',null,['id'=>'project_id'])}}
    {{ Form::close() }}
    
@stop


@section('css')
<style>
#sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 70%;
}
#sortable tr {
    margin: 0 3px 3px 3px;
    padding: 0.3em;
    padding-left: 1em;
    font-size: 15px;
}

.handle:hover{
    cursor: ns-resize;
}

.ui-sortable-helper {
    background-color: rgb(136, 245, 249) !important;
}

.ui-sortable-helper .handle{
    right: 0;
}

.ui-sortable-helper td{
    border:none;
    padding: 0;
}

.panel-placeholder {
  background-color: rgb(254, 196, 88);
}

</style>
@endsection

@section('js')
<script>
    const deleteProject = (id) => {
        $('#project_id').val(id);
        $('.delete').submit();
    }

    $("#sortable").sortable({
        containment: $(".card-body"),
        cursor: "ns-resize",
        // forceHelperSize: true,
        handle: ".handle",
        revert: true,
        placeholder: "panel-placeholder",
        helper: function(e, tr)
        {
          const $originals = tr.children();
          const $helper = tr.clone();
          $helper.children().each(function(index){
            $(this).width($originals.eq(index).width());
          });
          return $helper;
        }
    });
</script>
@endsection