@extends('layouts.app-bv4')

@section('content')
	<div class="row">
		<div class="col-md-5 offset-md-2">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>UPDATE {{$department->name}} DEPARTMENT</h1><hr>
			<div>
				
				{!! Form::Model($department, ['route' => ['department.update', $department], 'method'=>'PUT', 'id'=>'updateDepartment', 'class'=>'form']) !!}

					@include('shared.createDepartmentForm')

				{!! Form::close()!!}
			</div>
		</div>
	</div>

<style type="text/css">
	label.error{
		color: red;
		font-style: italic;
		
	}
</style>
@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/department/create.js') !!}"></script>
@endsection


