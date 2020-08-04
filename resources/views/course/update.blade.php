@extends('layouts.app-bv4')
 
@section('content')

	<div class="row">
		<div class="col-md-6 offset-md-2">
			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}
				</div>
			@endif
			<h1>UPDATE COURSE #{{$course->course_id}}</h1>
			<div class="">
				{!! Form::Model($course, ['route' => ['course.update', $course], 'method'=>'PUT', 'id'=>'createCourse', 'class'=>'form']) !!}

					@include('shared.createCourseForm')

				{!! Form::close() !!}
			</div>
			
		</div>
	</div>
	<a href="{{ route('course.index') }}">All COURSES&nbsp<span class="fas fa-search"></span></a>

<style type="text/css">
	label.error{
		color: red;
		font-style: italic;
		
	}
</style>
@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/course/create.js') !!}"></script>
@endsection