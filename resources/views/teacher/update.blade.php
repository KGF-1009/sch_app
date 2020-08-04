@extends('layouts.app-bv4')

@section('content')

	<div class="row">
		<div class="col-md-10 offset-md-1">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>UPDATE TEACHER #{{$teacher->matricule}}</h1>
			<hr>


			{!! Form::Model($teacher, ['route' => ['teacher.update', $teacher], 'method'=>'PUT', 'id'=>'createTeacher', 'class'=>'form', 'files'=>'true']) !!}

				@include('shared.createTeacherForm')
			{!! Form::close() !!}

		</div> <!-- end col-md-10 offset-md-2 -->
	</div> <!-- end row for form-->
	<a href="{{ route('teacher.index') }}">All Teacher&nbsp<span class="fas fa-search"></span></a>
	

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