@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <form method="GET" action="\orders">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    	<label for="email" class="control-label">
                    		Введите свой email
                    			<span class="text-danger">*</span>
                    	</label>
                    	<input class="form-control"
                    		   name="email"
                    		   type="text"
                    		   id="email"
                    		   value=""
                    	>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
