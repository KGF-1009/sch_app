@extends('layouts.app-bv4')

@section('content')
		<div class="row">
			<div class="col-md-10 offset-md-2">
				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif
			<h1>UPDATE STUDENT #{{$student->student_id}}</h1><hr>
				<div>
					{!! Form::Model($student, ['route' => ['students.update', $student], 'method'=>'PUT', 'id'=>'createStudent', 'class'=>'form', 'files'=>true]) !!}

						@include('shared.createStudentForm')

					{!! Form::close() !!}

				</div>
				<a href="{{ route('students.index') }}">All Students&nbsp<span class="fas fa-search"></span></a>
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



