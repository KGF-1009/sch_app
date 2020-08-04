@extends('layouts.app-bv4')

@section('content')


	<div class="row">
		<div class="col-md-6 offset-md-2">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>NEW COURSE</h1>


				{!! Form::open(['route'=>'course.store','class' => 'form', 'id'=>'createCourse', 'method' => 'post', 'files' => true]) !!}

					@include('shared.createCourseForm')

				{!! Form::close() !!}

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
	<script type="text/javascript" src="{!! asset('js/course/create.js') !!}"></script>
@endsection


<!--
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-row mb-3">
					<div class="col-md-2">
						<label for="student_id">Matricule</label>
						<input type="text" class="form-control" placeholder="Matricule" id="student_id" name="student_id" required minlength="3">
					</div>

					<div class="col-md-3">
						<label for="fname">First name</label>
						<input type="text" class="form-control" placeholder="First name" id="fname" name="fname" required>
					</div>

					<div class="col-md-3">
						<label for="sname">Second name</label>
						<input type="text" class="form-control" placeholder="Second name" id="sname" name="sname" required>
					</div>

					<div class="col-md-2">
						<label for="level">Level</label>
						<input type="number" class="form-control" placeholder="level" id="level" name="level" required max="7" min="1"><br>
					</div>
					
				</div>


				<div class="form-row mb-3">
					<div class="col-md-3">
						<label for="placeOfBirth">Place Of Birth</label>
						<input type="text" class="form-control" placeholder="Place Of Birth" id="placeOfBirth" name="placeOfBirth" required>
					</div>

					<div class="col-md-3">
						<label for="dateOfBirth">Date Of Birth</label>
						<input type="date" class="form-control" placeholder="Date Of Birth" id="dateOfBirth" name="dateOfBirth" required>
					</div>

					<div class="form-check form-check-inline col-md-4">
						<label for="male">Male</label>&nbsp
						<input class="form-check-input" type="radio" value="male" id="male" name="sex" required>

						<label for="sex">Female</label>&nbsp
						<input class="form-check-input" type="radio" value="female" id="female" name="sex" required>
						
					</div>
				</div>

				<div class="form-row mb-3">

					<div class="col-md-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" placeholder="Current Address" id="address" name="address" required>
					</div>

					<div class="col-md-3">
						<label for="enrollement_date">Enrollement date</label>
						<input type="date" class="form-control" placeholder="enrollement_date" id="enrollement_date" name="enrollement_date" required><br>
					</div>

					

					<div class="col-md-4">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" placeholder="Email" id="email" name="email" required><br>
						<input class="btn btn-success" type="submit" value="Submit">
					</div>

					

					
				</div>

			-->