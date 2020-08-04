@extends('layouts.app-bv4')

@section('content')

	<div class="row">
		<div class="col-md-10 offset-md-1">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>NEW TEACHER</h1><hr>

			{!! Form::open(['route'=>'teacher.store','class' => 'form', 'id'=>'createTeacher', 'method' => 'post', 'files' => 'true']) !!}

				@include('shared.createTeacherForm')
				
			{!! Form::close() !!}

		</div> <!-- end col-md-10 offset-md-2 -->
	</div> <!-- end row for form-->
	

<style type="text/css">
	label.error{
		color: red;
		font-style: italic;
		
	}
</style>
@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/teacher/create.js') !!}"></script>
@endsection