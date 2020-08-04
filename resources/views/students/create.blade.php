@extends('layouts.app-bv4')

@section('content')
	<div class="row">
		<div class="col-md-10 offset-md-2">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>NEW STUDENT</h1><hr>
				{!! Form::open(['route'=>'students.store', 'id'=>'createStudent', 'class'=>'form', 'method'=>'POST', 'files'=>true]) !!}

					@include('shared.createStudentForm')

				{!! Form::close()!!}
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
	<script type="text/javascript" src="{!! asset('js/students/create.js') !!}"></script>
@endsection