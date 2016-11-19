@extends('layouts.app')

@section('content')

<div class="col-md-6">
<div class="box box-primary">

{{ Form::model($order, array('action' => array('OrderController@store'), 'role' => 'form')) }}
<div class="box-body">
	<h6>Отправить заказ ! Форма заказа Если у вас есть вопросы, звоните +7(499)653-54-96111</h6>

	<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
		{{ Form::label('size', 'Размер обуви') }}
		{{ Form::select('size', (new \App\Type\OrderSize())->getData(), null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		{{ Form::label('name', 'Ваше имя') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
		{{ Form::label('phone', 'Контактный телефон') }}
		{{ Form::text('phone', null, array('class' => 'form-control')) }}
	</div>
	
	
	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
       </div>


	<div class="form-group {{ $errors->has('delivery') ? 'has-error' : '' }}">
		{{ Form::label('delivery', 'Адрес доставки') }}
		{{ Form::text('delivery', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
		{{ Form::label('comment', 'Комментарий') }}
		{{ Form::text('comment', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Сохранить', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}
</div>
</div>

@endsection