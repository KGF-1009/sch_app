<div class="form-row mb-3">

	<div class="col-md-2">
		{!! Form::label('student_id', 'Matricule') !!}
		{!! Form::text('student_id', null, ['class'=>'form-control', 'placeholder'=>'Matricule', 'required'=>'required', 'maxlength'=>'5','minlength'=>'2', 'placeholder'=>'Matricule']) !!}

		@error('student_id')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<div class="col-md-3">
		{!! Form::label('fname', 'First Name') !!}
		{!! Form::text('fname', null, ['class'=>'form-control', 'placeholder'=>'First name','required'=>'required', 'maxlength'=>'25','minlength'=>'2']) !!}

		@error('fname')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<div class="col-md-3">
		{!! Form::label('sname', 'Second Name') !!}
		{!! Form::text('sname', null, ['class'=>'form-control', 'placeholder'=>'Second name']) !!}
	</div>

	<div class="form-check form-check-inline col-md-2">
		{!! Form::label('male', 'Male') !!} &nbsp&nbsp
		{!! Form::radio('sex', 'male', ['id'=>'male', 'class'=>'form-check-input']) !!}&nbsp&nbsp

		{!! Form::label('female', 'Female') !!}&nbsp&nbsp
		{!! Form::radio('sex', 'female', ['id'=>'female', 'class'=>'form-check-input', 'required'=>'required']) !!}
	</div>
</div> 



	<div class="form-row mb-3">
		<div class="col-md-2">
			{!! Form::label('level', 'level') !!}
			{!! Form::number('level', null, ['class'=>'form-control', 'required'=>'required', 'step'=>'1' , 'min'=>'1', 'max'=>'7', 'placeholder'=>'level']) !!}
		</div>

		<div class="col-md-2">
			{!! Form::label('deparment_id', 'Department') !!}
			{!! Form::select('department_id', collect(['0'=>'Enter department'])->union($departments->pluck('name', 'id')), null, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-3 mb-3">
			{!! Form::label('placeOfBirth', 'Place of Birth') !!}
			{!! Form::text('placeOfBirth', null, ['class'=>'form-control', 'required'=>'required', 'minlength'=>'2', 'placeholder'=>'Place of Birth']) !!}
		</div>

		<div class="col-md-3 mb-3">
			{!! Form::label('dateOfBirth', 'date of Birth') !!}
			{!! Form::date('dateOfBirth', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Date of Birth']) !!}
		</div>

	</div>

	<div class="form-row mb-3 mb-3">
		<div class="col-md-3">
			{!! Form::label('address', 'Address') !!}
			{!! Form::text('address', null, ['class'=>'form-control', 'required'=>'required', 'minlength'=>'2', 'placeholder'=>'Address']) !!}
		</div>

		<div class="col-md-3">
			{!! Form::label('enrollement_date', 'Enrollement Date') !!}
			{!! Form::date('enrollement_date', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Enrollement date']) !!}
		</div>

		<div class="col-md-3">
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'email']) !!}<br>

		</div>

	</div>

	<div class="form-row mb-3">
		<div class="col-md-12 flex-column py-2">
		{!! Form::label('image', 'Profile Image', ['class'=>'form-label']) !!}<br>
		{!! Form::file('image', null, ['class'=>'form-control', 'placeholder'=>'Profile Image']) !!}
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		<!-- max file size in bytes -->
		<br>
		@error('image')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
		</div>

	</div>
	
	<div class="form-row mb-3">
		<div class="col-md-12">
			{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}		
		</div>
	
	</div>