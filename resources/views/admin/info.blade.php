@extends('layouts.inner')


@section('content-title')
Информация
@stop

@section('content-text')

{{ Form::open(['url' => '/admin/info/store']) }}
<div class="panel-body">
	<div class="form-group ">
		<textarea class="form-control" name="text" id="text" rows="15">{{ $item->text }}</textarea>
	</div>
</div>
<div class="form-buttons panel-footer">
	<div class="btn-group">
		<button type="submit" name="next_action" value="save_and_continue" class="btn btn-primary">
			<i class="fa fa-check"></i> Сохранить
		</button>


	</div>
</div>    
{{ Form::close() }}

@stop